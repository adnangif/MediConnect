<x-layout>
    <x-slot:styles>
        <link rel="stylesheet" href="/css/home_styles.css">
    </x-slot:styles>

    <x-navbar />
    <div class="main-container">
        <div class="flex">
            <div class="text-container">
                <div class="title">MediConnect</div>
                <p class="text-subtitle">At MediConnect, we are dedicated to transforming healthcare by providing easy
                    access to virtual consultations with certified doctors. Our platform ensures secure, convenient, and
                    timely medical advice, bringing quality care to patients wherever they are. With MediConnect,
                    healthcare
                    is just a click away.
                </p>
                <div class="btn-container gap-8">
                    @if (!Auth::check())
                        <a href="#get-started" class='btn'>Get Started</a>
                    @endif
                    <a href="/search" class='outline-btn'>search doctor</a>
                </div>
            </div>
            <lottie-player src="/lottie/doctor-healthcare-app.json" style="height: 600px" background="transparent"
                speed="1" loop autoplay></lottie-player>
        </div>

        <div class="section">
            <div class="title">Why Choose
                <span class="text-emerald-600 font-semibold">MediConnect?</span>
            </div>
            <div class="flex justify-center gap-4 bg-white p-4 rounded">
                <p class="text-secondary">
                    With MediConnect, accessing healthcare has never been easier. You can schedule consultations with
                    certified doctors from the comfort of your home or on the go, eliminating the need for travel and
                    waiting in long lines at clinics. Whether it's a routine check-up or urgent care, MediConnect
                    ensures healthcare is always within reach.
                </p>
                <img width="250" src="/image/easy-health-care.png" />

            </div>
            <div class="flex justify-center  gap-4 bg-white p-4 rounded">
                <img width="300" src="/image/timely-health-care.png" />
                <p class="text-secondary">
                    Time is critical when it comes to your health, and MediConnect ensures you receive quick, reliable
                    medical advice. Our platform allows you to book same-day appointments, providing you with timely
                    consultations that can prevent minor issues from becoming major health problems. No more waiting
                    days for appointments—your healthcare needs are met promptly.
                </p>
            </div>

            <div class="flex justify-center gap-4 bg-white p-4 rounded">
                <p class="text-secondary">
                    At MediConnect, we prioritize your privacy and security. Our platform uses end-to-end encryption to
                    protect your medical information and ensure that your consultations remain confidential. You can
                    trust that your personal health data is safe, giving you peace of mind during every interaction.
                </p>
                <img width="250" src="/image/privacy-health-care.png" />

            </div>
            <div class="flex justify-center  gap-4 bg-white p-4 rounded">
                <img width="300" src="/image/best-doctor.png" />
                <p class="text-secondary">
                    We partner with only the best healthcare professionals to provide you with the highest standard of
                    care. Every doctor on our platform is certified, experienced, and thoroughly vetted to ensure you
                    receive accurate, personalized medical advice. You can count on our doctors for trustworthy guidance
                    tailored to your specific health concerns.
                </p>
            </div>

            <div class="flex justify-center gap-4 bg-white p-4 rounded">
                <p class="text-secondary">
                    MediConnect is designed with simplicity and ease of use in mind. Our intuitive interface allows you
                    to schedule appointments, consult with doctors, and manage your medical records effortlessly,
                    without the need for any technical knowledge. We make healthcare accessible to everyone, offering a
                    seamless and stress-free experience.
                </p>
                <img width="250" src="/image/ease-of-use.png" />

            </div>



        </div>

        @if (!Auth::check())
            <div id="get-started"></div>
            <div class="flex">
                <div class="text-container">
                    <div class="title">As a Patient</div>
                    <p class="text-subtitle">Registering as a patient on MediConnect is quick and hassle-free. Simply
                        create an account using your email or phone number, complete your profile with basic information
                        and medical history, and verify your identity for security. Once registered, you can easily
                        browse through our list of certified doctors and book appointments at your convenience. With
                        MediConnect, accessing quality healthcare is just a few clicks away.
                    </p>
                    <div class="btn-container">
                        <a href="/user/register" class='btn'> Register</a>
                    </div>
                </div>
                <lottie-player src="/lottie/heart-research.json" style="height: 600px;" background="transparent"
                    speed="1" loop autoplay></lottie-player>
            </div>

            <div class="flex">
                <div class="text-container">
                    <div class="title">As a Doctor</div>
                    <p class="text-subtitle">To become a MediConnect Certified Doctor, simply create an account and
                        submit
                        your medical credentials for verification. Once your qualifications are reviewed and approved,
                        you
                        can complete your profile with your specialties and experience to help patients find you. As a
                        certified doctor, you’ll be able to offer virtual consultations and connect with patients from
                        anywhere, expanding your practice and providing convenient, quality healthcare.
                    </p>
                    <div class="btn-container">
                        <a href="/doctor/register" class='btn'> Register</a>

                    </div>
                </div>
                <div>

                    <lottie-player src="/lottie/healthcare.json" style="height: 500px;width: 500px;margin-top:3rem;"
                        background="transparent" speed="1" loop autoplay></lottie-player>
                </div>
            </div>
        @endif

        <div class="section">
            <div class="text-container">
                <div class="title">Recommended Doctors</div>
            </div>
            <div class="grid grid-cols-3 gap-10">

                @foreach ($doctors as $doctor)
                    <div class="flex flex-col gap-2">
                        <a
                            href="/doctor/profile/{{ $doctor->doctor_id }}"class="button max-w-xs transition duration-100 ease-in-out hover:scale-110">
                            <img width="200" src="{{ $doctor->image ?? '/image/dummy-person.png' }}"
                                alt="Doctor Image" />
                        </a>


                        <div>
                            <div class="font-bold">{{ $doctor->name }}</div>
                            <div class="text-gray-500">{{ $doctor->qualifications }}</div>
                            <i class="uppercase text-gray-500">{{ $doctor->specialization }}</i>
                        </div>
                        @if (Auth::check() && Auth::user()->isUser())
                        <div class="">
                            <a href="/book-appointment/{{ $doctor->doctor_id }}" class='btn'> Book Appointment</a>
                        </div>
                        @else
                        <div class="">
                            <button disabled class="btn bg-gray-400 cursor-not-allowed align-text-top">user required</button>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>

        <div class="bg-secondary grid grid-cols-4 p-4 gap-4 rounded-md font-normal ">
            <div class="col-span-2">
                <div class="font-bold text-lg">MediConnect</div>
                <div class="text-gray-600">At MediConnect, we don’t just provide healthcare consultations, we deliver
                    seamless experiences that make quality care accessible for everyone.
                </div>
            </div>

            <div class="flex flex-col col-span-1 gap-1 text-gray-600">
                <div class="font-bold text-gray-950">Specialists</div>
                <a href="{{ route('specialized-doctors-list', 'Cardiologist') }}">Cardiologist</a>
                <a href="{{ route('specialized-doctors-list', 'Dermatologist') }}">Dermatologist</a>
                <a href="{{ route('specialized-doctors-list', 'Gynecologist') }}">Gynecologist</a>
                <a href="{{ route('specialized-doctors-list', 'General Physician') }}">General Physician</a>
                <a href="{{ route('specialized-doctors-list', 'Neurologist') }}">Neurologist</a>
                <a href="{{ route('specialized-doctors-list', 'Orthopedist') }}">Orthopedist</a>
                <a href="{{ route('specialized-doctors-list', 'Pediatrician') }}">Pediatrician</a>
                <a href="{{ route('specialized-doctors-list', 'Orthopedic Surgeon') }}">Orthopedic Surgeon</a>

            </div>

            <div class="flex flex-col gap-1 col-span-1">
                <div class="font-bold text-lg">Contact Us</div>
                <div class="text-gray-600">Email: info@mediconnect.com</div>
                <div class="text-gray-600">Phone: +8801771802195</div>
                <div class="text-gray-600">Address: Khulna Sadar, Khulna</div>
            </div>

            <hr class="full-column" />
            <div class="flex justify-end w-full full-column font-bold text-gray-500">
                <div>© 2024 MediConnect. All Rights Reserved.</div>
            </div>
        </div>

    </div>

</x-layout>
