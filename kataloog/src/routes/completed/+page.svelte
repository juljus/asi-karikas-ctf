<script lang="ts">
	import { enhance } from '$app/forms';

	export let data;

	let ctfCode = '';
	const ctfCodes = ['this_is_done', 'this_is_not_done', 'another_one'];

	// Build a list of done CTFs based on data.user ctfDone fields
	let doneCtfCodes = [];
	if (data?.user?.ctfDone0) {
		doneCtfCodes.push({ index: 0, code: ctfCodes[0] });
	}
	if (data?.user?.ctfDone1) {
		doneCtfCodes.push({ index: 1, code: ctfCodes[1] });
	}
	if (data?.user?.ctfDone2) {
		doneCtfCodes.push({ index: 2, code: ctfCodes[2] });
	}
</script>

<div class="min-h-screen bg-gray-100 p-6">
	<div class="mb-4 flex flex-wrap justify-between">
		<h1 class="text-2xl font-bold">CTF Dashboard</h1>
		<form action="?/logout" method="post" use:enhance>
			<button class="btn rounded bg-blue-600 p-2 text-white">Logout</button>
		</form>
	</div>
	<form method="post" use:enhance>
		<label> Enter CTF Code: </label>
		<input type="text" name="ctfCode" bind:value={ctfCode} />
		<button class="btn rounded bg-gray-700 p-3 text-white" type="submit">Sisesta</button>
	</form>

	<!-- List of completed CTFs with index and code -->
	{#if doneCtfCodes.length > 0}
		<h2 class="mt-4 text-lg font-semibold">Completed CTFs</h2>
		<ul>
			{#each doneCtfCodes as done}
				<li>#{done.index} - {done.code}</li>
			{/each}
		</ul>
	{/if}
</div>
