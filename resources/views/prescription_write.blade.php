<x-layout>
    <x-navbar />

    <form method="POST" class="bg-gray-100 m-24 grid gap-6 p-12 rounded-md">
        @csrf
        <div class="text-3xl flex ">
            Write Prescription
        </div>
        <div id="medicine-fields" class="grid gap-4">
            <div class="flex w-full">
                <textarea name="rx" placeholder="Rx" rows="6" class="grow resize-none rounded-md">{{$prescription->rx}}</textarea>
            </div>

            @foreach ( $medicines as $medicine)
            <div class="flex w-full">
                <textarea name="medicines[]" placeholder="Medicine" rows="6" class="grow resize-none rounded-md">{{ $medicine->medicine_text }}</textarea>
            </div>
            @endforeach
        </div>

        <div class="flex gap-4 justify-end">
            <button type="button" id="add-medicines-btn" class="outline-btn"> + ADD Medicine</button>
            <button type="submit" id="add-medicines-btn" class="btn">Save</button>
        </div>



    </form>

    <script>
        document.getElementById('add-medicines-btn').addEventListener('click', () => {
            const med_field = document.createElement('div')
            med_field.classList.add('flex', 'w-full')
            med_field.innerHTML = `<textarea name="medicines[]" placeholder="Medicine" rows="6" class="grow resize-none rounded-md"></textarea>`
            document.getElementById('medicine-fields').appendChild(med_field)
        })
    </script>
</x-layout>
