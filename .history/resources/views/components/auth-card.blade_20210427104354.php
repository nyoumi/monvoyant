<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
<<<<<<< HEAD
        {{ $logo }}
=======
        {{ $logo ?? ''}}
>>>>>>> 61752209ea97f4cfa820ffaf3d821e5a6e3e8714
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
