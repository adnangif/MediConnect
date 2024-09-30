<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MediConnect</title>
    <link rel="stylesheet" href="/css/home_styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
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
                <div class="btn-container">
                    <a href="#get-started" class='btn'>Get Started</a>
                </div>
            </div>
            <lottie-player src="/lottie/doctor-healthcare-app.json" style="height: 600px" background="transparent"
                speed="1" loop autoplay></lottie-player>
        </div>

        <div class="section">
            <div class="title">Why Choose MediConnect?</div>
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
                    <button class='btn'>Register</button>
                </div>
            </div>
            <lottie-player src="/lottie/heart-research.json" style="height: 600px;" background="transparent"
                speed="1" loop autoplay></lottie-player>
        </div>

        <div class="flex">
            <div class="text-container">
                <div class="title">As a Doctor</div>
                <p class="text-subtitle">To become a MediConnect Certified Doctor, simply create an account and submit
                    your medical credentials for verification. Once your qualifications are reviewed and approved, you
                    can complete your profile with your specialties and experience to help patients find you. As a
                    certified doctor, you’ll be able to offer virtual consultations and connect with patients from
                    anywhere, expanding your practice and providing convenient, quality healthcare.
                </p>
                <div class="btn-container">
                    <button class='btn'>Register</button>
                </div>
            </div>
            <div>

                <lottie-player src="/lottie/healthcare.json" style="height: 500px;width: 500px;margin-top:3rem;"
                    background="transparent" speed="1" loop autoplay></lottie-player>
            </div>
        </div>

        <div class="section leading-3">
            <div class="text-container">
                <div class="title">Recommended Doctors</div>
            </div>
            <div class="grid gap-8">

                <div class="flex flex-col gap-4">
                    <img width="200" src="/image/dummy-person.png" />
                    <div>
                        <div class="font-bold">Muhammad Abdul Latif</div>
                        <div class="font-thin">MBBS, BCS (Health), MS (Orthopedic Surgery)</div>
                        <i class="uppercase font-thin">Orthopedic (Bone, Joint, Arthritis, Spine) Specialist & Trauma
                            Surgeon</i>
                    </div>
                    <div class="">
                        <button class='btn'>Book An appointment</button>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <img width="200" src="/image/dummy-person.png" />
                    <div>
                        <div class="font-bold">Muhammad Abdul Latif</div>
                        <div class="font-thin">MBBS, BCS (Health), MS (Orthopedic Surgery)</div>
                        <i class="uppercase font-thin">Orthopedic (Bone, Joint, Arthritis, Spine) Specialist & Trauma
                            Surgeon</i>
                    </div>
                    <div class="">
                        <button class='btn'>Book An appointment</button>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <img width="200" src="/image/dummy-person.png" />
                    <div>
                        <div class="font-bold">Muhammad Abdul Latif</div>
                        <div class="font-thin">MBBS, BCS (Health), MS (Orthopedic Surgery)</div>
                        <i class="uppercase font-thin">Orthopedic (Bone, Joint, Arthritis, Spine) Specialist & Trauma
                            Surgeon</i>
                    </div>
                    <div class="">
                        <button class='btn'>Book An appointment</button>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <img width="200" src="/image/dummy-person.png" />
                    <div>
                        <div class="font-bold">Muhammad Abdul Latif</div>
                        <div class="font-thin">MBBS, BCS (Health), MS (Orthopedic Surgery)</div>
                        <i class="uppercase font-thin">Orthopedic (Bone, Joint, Arthritis, Spine) Specialist & Trauma
                            Surgeon</i>
                    </div>
                    <div class="">
                        <button class='btn'>Book An appointment</button>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <img width="200" src="/image/dummy-person.png" />
                    <div>
                        <div class="font-bold">Muhammad Abdul Latif</div>
                        <div class="font-thin">MBBS, BCS (Health), MS (Orthopedic Surgery)</div>
                        <i class="uppercase font-thin">Orthopedic (Bone, Joint, Arthritis, Spine) Specialist & Trauma
                            Surgeon</i>
                    </div>
                    <div class="">
                        <button class='btn'>Book An appointment</button>
                    </div>
                </div>










            </div>

        </div>

        <div class="bg-secondary grid p-4 gap-4 rounded-md leading-3 font-thin">
            <div class="">
                <div class="font-bold text-lg">MediConnect</div>
                <div class="text-gray-600">At MediConnect, we don’t just provide healthcare consultations, we deliver
                    seamless experiences that make quality care accessible for everyone.
                </div>
            </div>

            <div class="flex flex-col gap-1">
                <div class="font-bold">Specialists</div>
                <div>Cardiologist</div>
                <div>Pediatrician</div>
                <div>Dermatologist</div>
                <div>Neurologist</div>
                <div>Orthopedic Surgeon</div>
                <div>General Physician</div>
            </div>

            <div class="flex flex-col gap-1">
                <div class="font-bold text-lg">Contact Us</div>
                <div class="text-gray-600">Email: info@mediconnect.com</div>
                <div class="text-gray-600">Phone: +8801771802195</div>
                <div class="text-gray-600">Address: Khulna Sadar, Khulna</div>
            </div>

            <hr class="full-column" />
            <div class="flex justify-end w-full full-column">
                <div>© 2024 MediConnect. All Rights Reserved.</div>
            </div>
        </div>



    </div>


</body>

</html>
