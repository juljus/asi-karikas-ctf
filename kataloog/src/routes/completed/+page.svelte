<script lang="ts">
	import { enhance } from '$app/forms';
	import type { PageServerData } from './$types';

	let { data }: { data: PageServerData } = $props();

	let ctfCode;

	const ctfCodes = [
		'always_chang3_y0ur_default_passw0rds',
		'',
		'th1s_file_validation_1s_really_weak',
		'said_tasuta_s4rgi!',
		'found_the_secret_image'
	];

	// Build a list of done CTFs based on data.user ctfDone fields
	let doneCtfCodes = [];
	if (data?.user?.ctf_done0) {
		doneCtfCodes.push({ index: 0, code: ctfCodes[0] });
	}
	if (data?.user?.ctfDone1) {
		doneCtfCodes.push({ index: 1, code: ctfCodes[1] });
	}
	if (data?.user?.ctfDone2) {
		doneCtfCodes.push({ index: 2, code: ctfCodes[2] });
	}
	if (data?.user?.ctfDone3) {
		doneCtfCodes.push({ index: 3, code: ctfCodes[3] });
	}
	if (data?.user?.ctfDone4) {
		doneCtfCodes.push({ index: 4, code: ctfCodes[4] });
	}
</script>

<div class="min-h-screen bg-gray-100 p-6">
	<div class="mb-4 flex flex-wrap justify-between">
		<h1 class="text-2xl font-bold">CTF Dashboard</h1>
		<form action="?/logout" method="post" use:enhance>
			<button class="btn rounded bg-blue-600 p-2 text-white">Logout</button>
		</form>
	</div>
	<a href="/" class="btn rounded bg-blue-600 p-3 text-white">Tagasi</a>
	<form method="post" class="my-5" use:enhance>
		<label for="ctfCode"> Sisesta CTF kood: </label>
		<input type="text" name="ctfCode" bind:value={ctfCode} />
		<button class="btn rounded bg-gray-700 p-3 text-white" type="submit">Kontrolli</button>
	</form>

	<!-- List of completed CTFs with index and code -->
	{#if doneCtfCodes.length > 0}
		<h2 class="mt-4 text-lg font-semibold">Tehtud CTFid</h2>
		<ul>
			{#each doneCtfCodes as done}
				<li>#{done.index} - {done.code}</li>
			{/each}
		</ul>
	{/if}
</div>
