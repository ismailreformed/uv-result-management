<div
    x-data="{
		printDiv() {
			var printContents = this.$refs.container.innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	}"
    x-cloak
    x-ref="container"
    class="print:text-black relative"
>
    <div class="print:hidden absolute top-3 right-4">
        <button type="button" x-on:click="printDiv()">Print</button>
    </div>

    {{ $slot }}
</div>
