<script lang="ts">
	import { enhance } from '$app/forms';
	import type { ActionData } from './$types';

	let { form }: { form: ActionData } = $props();
</script>

<div class="flex h-screen flex-col items-center justify-center bg-gray-100">
	<form
		method="post"
		class="m-5 flex flex-col items-center gap-3 rounded bg-white p-10 shadow"
		action="?/login"
		use:enhance
	>
		<h1 class="text-bold text-3xl">CTFid</h1>
		<label>
			<input name="username" class="rounded" placeholder="Username" />
		</label>
		<label>
			<input placeholder="Password" type="password" class="rounded" name="password" />
		</label>
		<div class="">
			<button class="btn rounded bg-blue-800 p-4 text-white" formaction="?/register"
				>Register</button
			>
			<button class="btn rounded bg-blue-800 p-4 px-6 text-white" aria-selected="true">Login</button
			>
		</div>
		<p style="color: red">{form?.message ?? ''}</p>
	</form>
</div>
