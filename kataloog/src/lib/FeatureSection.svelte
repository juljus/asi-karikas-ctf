<script>
	export let title = '';
	export let description = '';
	export let link = '';
	export let colorClass = 'bg-red-300';
</script>

<section class="flex flex-row items-center justify-between rounded p-5 shadow {colorClass}">
	<div>
		<h3 class="text-lg font-semibold">{title}</h3>
		<p class="text-sm"><span class="font-semibold">Juhend:</span> {description}</p>
	</div>
	<a href={link} class="btn rounded bg-gray-700 p-3 text-white">Enter</a>
</section>
