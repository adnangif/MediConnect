<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Write Prescription</title>
    <link rel="stylesheet" href="/css/navbar_styles.css" />
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar />

    <div class="bg-gray-100 m-24 grid gap-6 p-12 rounded-md">
        <div class="text-3xl flex ">
            Write Prescription
        </div>
        <div class="flex w-full">
            <div class="grow">Medicine 1</div>
            <textarea rows="6" class="grow resize-none rounded-md"></textarea>
        </div>

        <div class="flex w-full">
            <div class="grow">Medicine 1</div>
            <textarea rows="6" class="grow resize-none rounded-md"></textarea>
        </div>

        <div class="flex w-full">
            <div class="grow">Medicine 1</div>
            <textarea rows="6" class="grow resize-none rounded-md"></textarea>
        </div>
        
        <div class="flex justify-end">
            <button class="btn"> + ADD another Medicine</button>
        </div>

        <div class="flex w-full">
            <div class="grow">Test 1</div>
            <textarea rows="6" class="grow resize-none rounded-md"></textarea>
        </div>

        <div class="flex w-full">
            <div class="grow">Test 2</div>
            <textarea rows="6" class="grow resize-none rounded-md"></textarea>
        </div>

        <div class="flex justify-end">
            <button class="btn"> + ADD another Test</button>
        </div>

        <div class="flex justify-center">
            <button class="btn">save Prescription</button>
        </div>
    </div>
</body>
</html>