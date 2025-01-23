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
					<h3 class="text-lg font-semibold">CTF One</h3>
					<p class="text-sm">Description for CTF One.</p>
				</div>
				<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
			</div>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-red-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">CTF Two</h3>
				<p class="text-sm">Description for CTF Two.</p>
			</div>
			<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-yellow-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">CTF Three</h3>
				<p class="text-sm">Description for CTF Three.</p>
			</div>
			<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
		</section>

		<section class="flex flex-row items-center justify-between rounded bg-blue-300 p-5 shadow">
			<div>
				<h3 class="text-lg font-semibold">CTF Three</h3>
				<p class="text-sm">Description for CTF Three.</p>
			</div>
			<a href="" class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
		</section>
	</div>
</div>
