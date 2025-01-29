<script lang="ts">
	import { enhance } from '$app/forms';
	import type { PageServerData } from './$types';

	let { data }: { data: PageServerData } = $props();
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
				<p class="text-m pt-1">Here you will find your next challenge.</p>
			</div>
			<div class="flex-grow rounded bg-white p-5 shadow sm:flex-grow-0">
				<h2 class="text-xl font-semibold">CTFs done</h2>
				<p class="text-3xl font-bold text-blue-600">42</p>
			</div>
		</div>

		<section class="rounded shadow">
			<img src="https://fakeimg.pl/2400x400" class="h-full w-64 object-cover" alt="" />
			<div class="flex flex-row items-center justify-between bg-green-300 p-5">
				<div>
					<h3 class="text-lg font-semibold">Vaikimisi kasutaja paroolid</h3>
					<p class="pr-1 text-sm">
						<span class="font-semibold">Juhend:</span> Pead leidma Dahua turvakaamera administraatori
						paroolid (ehk Administrator: 888888) ning logima sisse. Sain kunagi meie kooli IT asset management
						süsteemi kasutades vaikimisi kasutaja parooli, mis ei olnud muudetud.
					</p>
				</div>
				<a href="/CTFid/login" class="btn rounded bg-gray-700 p-3 text-white">Sisene</a>
			</div>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-red-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">SQL Injection</h3>
				<p class="text-sm">
					Allow raw inputs to reach the database without proper sanitization, enabling malicious
					queries.
				</p>
			</div>
			<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-yellow-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">Weak Password Challenge</h3>
				<p class="text-sm">Prompt users to brute force or guess trivial credentials.</p>
			</div>
			<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-blue-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">Admin Privilege Escalation</h3>
				<p class="text-sm">Give standard users direct or indirect access to admin functionality.</p>
			</div>
			<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-green-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">XSS Challenge</h3>
				<p class="text-sm">
					Embed unsanitized user input into the page, letting the attacker inject scripts.
				</p>
			</div>
			<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-red-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">Directory Traversal</h3>
				<p class="text-sm">Permit users to request files outside the web root via crafted paths.</p>
			</div>
			<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-yellow-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">Ignored Validation</h3>
				<p class="text-sm">
					Omit or hide client-side checks, letting users bypass them to submit potentially harmful
					data.
				</p>
			</div>
			<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-blue-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">Peidetud vormid</h3>
				<p class="pr-1 text-sm">
					<span class="font-semibold">Juhend:</span> Pead eemaldama "readonly" atribuudi hinna sisendilt
					ning sisestama sinna 0, et t-särgi tasuta osta.
				</p>
			</div>
			<a href="/CTFid/hidden" class="btn rounded bg-gray-700 p-3 text-white">Sisene</a>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-green-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">Open Redirect</h3>
				<p class="text-sm">
					Let attackers craft links that redirect to unexpected external sites by manipulating query
					parameters.
				</p>
			</div>
			<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-red-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">Cookie forging</h3>
				<p class="text-sm">Accept tampered cookies to demonstrate improper session validation</p>
			</div>
			<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
		</section>
	</div>
</div>
