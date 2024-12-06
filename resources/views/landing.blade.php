<x-layout>
    <x-slot:content>
        <section class="flex justify-center mb-48">
            <div class="text-center max-w-4xl">
                <h1 class="mb-8 text-5xl font-extrabold"><span class="text-transparent bg-clip-text bg-gradient-to-l from-blue-100 to-blue-500">Ngamen.In</span></h1>
                <h1 class="text-5xl font-extrabold mb-2">From solo acts to full bands,</h1>
                <h1 class="text-5xl font-extrabold mb-8">This is your go-to hub for live music!</h1>
                <h1 class="text-lg font-normal text-gray-400 mb-12">Start connecting with talented musicians through our platform designed to make hiring effortless. Discover a variety of performers for any event and bring your moments to life with just a few clicks.</h1>
                <a href="#">
                    <x-primarybutton>Find Musicians</x-primarybutton>
                </a>
                <a href="#">
                    <x-secondarybutton>Register as Musician</x-secondarybutton>
                </a>
            </div>
        </section>

        <section class="flex justify-center mb-48">
            <div class="text-center max-w-7xl">
                <h1 class="mb-4 font-extrabold dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-100 to-blue-500">How it works</span></h1>

                <div class="flex justify-center mt-24 gap-12">
                    <div class="w-1/3">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-b from-blue-400 to-blue-600 flex items-center justify-center text-white text-4xl shadow-xl">
                            🔎
                        </div>
                        <h1 class="text-2xl font-bold mb-4">1. Find Musicians</h1>
                        <p class="text-gray-400">Search for musicians based on your event type, location, and budget. Browse through profiles and listen to samples to find the perfect match.</p>
                    </div>
                    <div class="w-1/3">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-b from-blue-400 to-blue-600 flex items-center justify-center text-white text-4xl shadow-xl">
                            📝
                        </div>
                        <h1 class="text-2xl font-bold mb-4">2. Book Online</h1>
                        <p class="text-gray-400">Once you've found the right musician, book them directly through our platform. Securely pay for your booking and receive instant confirmation.</p>
                    </div>
                    <div class="w-1/3">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-b from-blue-400 to-blue-600 flex items-center justify-center text-white text-4xl shadow-xl">
                            🍿
                        </div>
                        <h1 class="text-2xl font-bold mb-4">3. Enjoy the Show</h1>
                        <p class="text-gray-400">Sit back and relax as your chosen musician arrives at your event. Enjoy the live music and create unforgettable memories with your guests.</p>
                    </div>
                </div>

            </div>
        </section>

        

        <section class="flex justify-center mb-48">
            <div class="text-center">
                <span class="font-extrabold text-transparent text-3xl md:text-5xl lg:text-6xl bg-clip-text bg-gradient-to-l from-blue-100 to-blue-500">Key Features</span>

                <div class="text-left flex mt-24 gap-24">
                    <x-card
                        emoji="🔎"
                        title="Find the perfect musician easily"
                        description="Discover a wide range of talented musicians for every occasion, from solo performers to full bands. Our platform allows you to browse profiles by event type, location, and budget. Whether you're planning a wedding, corporate event, or casual gathering, find musicians who align perfectly with your vision."
                    />
                    <x-card
                        emoji="📝"
                        title="Instant Booking System"
                        description="Gone are the days of endless back-and-forths. With our intuitive booking system, you can easily secure your desired musician within minutes. The process is simple and hassle-free: select a musician, review their availability, and confirm your booking. Instant notifications ensure both you and the musician are aligned from the start."
                    />
                </div>

                <div class="text-left flex mt-24 gap-24">
                    <x-card
                        emoji="☑️"
                        title="Verified Profiles and Reviews"
                        description="Every musician on our platform has a detailed profile showcasing their skills, experience, and sample performances. To help you make informed decisions, our review system includes genuine feedback from past clients. Rest assured, you’re hiring trusted professionals who meet your expectations."
                    />
                    <x-card
                        emoji="💸"
                        title="Flexible Payment Options"
                        description="We provide multiple payment methods to suit your convenience, including credit cards, e-wallets, and bank transfers. All transactions are handled securely, with complete transparency. Plus, we offer a clear refund policy to protect both clients and musicians in case of any unforeseen issues."
                    />
                </div>
            </div>
        </section>

    </x-slot:content>
</x-layout>