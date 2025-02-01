<script lang="ts">
	import { enhance } from '$app/forms';
	import FeatureSection from '$lib/FeatureSection.svelte';
	import type { PageServerData } from './$types';

	let { data }: { data: PageServerData } = $props();

	const countAllCTFs =
		(data.user?.ctfsDone0 ?? 0) +
		(data.user?.ctfsDone1 ?? 0) +
		(data.user?.ctfDone2 ?? 0) +
		(data.user?.ctfDone3 ?? 0) +
		(data.user?.ctfDone4 ?? 0);
</script>

<div class="min-h-screen bg-gray-100 p-6">
	<div class="mb-4 flex flex-wrap justify-between">
		<h1 class="text-2xl font-bold">CTF Dashboard</h1>
		<form action="?/logout" method="post" use:enhance>
			<button class="btn rounded bg-blue-600 p-2 text-white">Logout</button>
		</form>
	</div>
	<div class="flex flex-col flex-wrap gap-4">
		<div class="flex flex-row flex-wrap gap-5">
			<div class="flex-grow rounded bg-white p-5 shadow">
				<h2 class="text-xl font-semibold">Welcome, {data.user.username}!</h2>
				<p class="text-m pt-1">Siin on loetelu tavalisematest vigadest veebirakendustes.</p>
			</div>
			<div class="inline-flex flex-grow flex-col rounded bg-white p-5 shadow sm:flex-grow-0">
				<div class="">
					<h2 class="text-xl font-semibold">CTFs done</h2>
					<p class="text-3xl font-bold text-blue-600">0</p>
				</div>
				<a href="/completed" class="btn rounded bg-blue-600 p-2 text-center text-white"
					>Check CTFs</a
				>
			</div>
		</div>

		<FeatureSection
			title="Vaikimisi kasutaja paroolid"
			description="Pead leidma Dahua turvakaamera administraatori paroolid (ehk Administrator: 888888) ning logima sisse. Sain kunagi meie kooli IT asset management süsteemi kasutades vaikimisi kasutaja parooli, mis ei olnud muudetud."
			link="/CTFid/login"
			colorClass="bg-green-300"
		/>

		<FeatureSection
			title="SQL Injection"
			description="Antud veebilehel on võimalik kontrollida oma kontojääki kukeseente ostmis ja müümis rakenduses. Sisselogimiseks pead sisestama oma kasutajanime ja parooli. Sinu sisendit aga ei puhastata nii et on võimalik teha SQL injection. Pannes kasutajanimeks näiteks  ' OR 1=1 --  viskab veebirakendus välja kasutajate andmebaasi sisu (mis on ka muidugi krüpteerimata), milles on ka kasutaja ASI_KARIKAS. Selle kontoga sisse logides leiadki flagi."
			link="/CTFid/SQLinject"
			colorClass="bg-red-300"
		/>

		<FeatureSection
			title="Pildi üleslaadimine"
			description="Pead üles laadima exe faili, lisades faili lõppu .png.exe"
			link="/CTFid/image"
			colorClass="bg-yellow-300"
		/>

		<FeatureSection
			title="Peidetud vormid"
			description="Pead eemaldama 'readonly' atribuudi hinna sisendilt ning sisestama sinna 0, et omale tasuta t-särgi osta."
			link="/CTFid/hidden"
			colorClass="bg-blue-300"
		/>

		<FeatureSection
			title="Server Side Request Forgery probleem"
			description="Pead sisestama URL sisendisse http://localhost:3000/ctf.png või http://127.0.0.1:3000/ctf.png, et leida flagi."
			link="/CTFid/xss"
			colorClass="bg-purple-300"
		/>
	</div>
</div>
