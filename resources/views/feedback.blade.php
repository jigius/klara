<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Обратная связь</title>
</head>
<body style="min-width: 375px;">
    <div class="max-w-xl mx-auto mt-16 flex w-full flex-col border rounded-lg bg-white p-8 min-w-64">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">{{ trans("feedback.validation_is_failure") }}</strong>
                    @foreach ($errors->all() as $error)
                        <p class="block">{{ $error }}</p>
                    @endforeach
            </div>
        @elseif(Session::has('farewell'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">{{ Session::get('farewell') }}</strong>
            </div>
        @endif
        <h2 class="title-font mb-1 text-lg font-medium text-gray-900">Обратная связь</h2>
        <p class="mb-5 leading-relaxed text-gray-600">Если у вас есть пожелания или предложения, поделитесь ими с нами!</p>
        <form action="/feedback/create" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="text-sm leading-7 text-gray-600">Email <span class="text-red-700">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full rounded border border-gray-300 bg-white py-1 px-3 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" />
            </div>
            <div class="mb-4">
                <label for="message" class="text-sm leading-7 text-gray-600">Сообщение <span class="text-red-700">*</span></label>
                <textarea id="message" name="message"
                    class="h-32 w-full resize-none rounded border border-gray-300 bg-white py-1 px-3 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200"
                >{{ old('message') }}</textarea>
            </div>
            <button class="rounded border-0 bg-indigo-500 py-2 px-6 text-lg text-white hover:bg-indigo-600 focus:outline-none">Отправить</button>
        </form>
    </div>
</body>
</html>
