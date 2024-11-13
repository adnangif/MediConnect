<x-layout>
    <x-navbar />
    <x-slot:styles>
        <style>
            body {
                background-color: #f7f7f7;
            }
        </style>
    </x-slot:styles>
    <div class="container mx-auto p-6">
        <form method="POST" class="p-8 flex flex-col items-center gap-3 text-center">
            @csrf
            <h1 class="text-2xl font-bold text-emerald-600 mb-4">Write a review</h1>
            <textarea rows="4" class="p-2 w-1/2 resize-none rounded-md border border-gray-500 outline-none"
                placeholder="write your review here"
                name="review"
                ></textarea>
            
            <div id="emoji-picker" class="text-2xl text-gray-600 mt-8">Share Your Experience</div>
            <div class="flex space-x-8 justify-center mt-4">
                <label class="cursor-pointer text-3xl hover:scale-110 transition-transform duration-150">
                    <input type="radio" name="rating" value="1" class="hidden">
                    <span class="emoji">😞</span>
                </label>
                <label class="cursor-pointer text-3xl hover:scale-110 transition-transform duration-150">
                    <input type="radio" name="rating" value="2" class="hidden">
                    <span class="emoji">😐</span>
                </label>
                <label class="cursor-pointer text-3xl hover:scale-110 transition-transform duration-150">
                    <input type="radio" name="rating" value="3" class="hidden">
                    <span class="emoji">🙂</span>
                </label>
                <label class="cursor-pointer text-3xl hover:scale-110 transition-transform duration-150">
                    <input type="radio" name="rating" value="4" class="hidden">
                    <span class="emoji">😊</span>
                </label>
                <label class="cursor-pointer text-3xl hover:scale-110 transition-transform duration-150">
                    <input type="radio" name="rating" value="5" class="hidden">
                    <span class="emoji">🤩</span>
                </label>
            </div>

            <button class="btn mt-4" type="submit">Submit Review</button>


        </form>
    </div>

    <script>
        const labels = document.querySelectorAll('.emoji');
        const emojiPicker = document.getElementById('emoji-picker');

        labels.forEach(label => {
            label.addEventListener('click', (event) => {
                emojiPicker.textContent = `${event.target.textContent}`;
            });
        });
    </script>
</x-layout>
