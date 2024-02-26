@props(['orientation'])

<div
    x-data="{
		printDiv(orientation) {
			var printContents = this.$refs.container.innerHTML.trim();
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			document.body.style.orientation = orientation; // Set page orientation
			window.print();
			document.body.innerHTML = originalContents;
		}
	}"
    x-cloak
    x-ref="container"
    class="print:text-black relative"
>
    <div class="print:hidden absolute top-3 right-4">
        <button
            type="button"
            class="px-4 py-2 bg-blue-900 text-white rounded-lg justify-center items-end"
            x-on:click="printDiv('{{$orientation}}')">Print</button>
    </div>

    {{ $slot }}

    <style>
        /* CSS for printing */
        @media print {
            /* Hide page header and footer */
            @page {
                size: auto; /* auto is the default value */
                margin: 0; /* zero out the page margins */
            }
        }
    </style>
</div>
