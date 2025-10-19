@extends('layouts.app')

@section('content')
<div class="container" data-aos="fade-up">
    <h1 class="text-success fw-bold mb-4">Contact Barangay Balintawak</h1>

    <div class="card shadow-sm p-4">
        <p class="mb-2"><strong>📍 Address:</strong> Barangay Hall, Balintawak, Talibon, Bohol</p>
        <p class="mb-2"><strong>📞 Contact Number:</strong> (038) 123-4567</p>
        <p class="mb-2"><strong>📧 Email:</strong> brgybalintawak@gmail.com</p>
        <p class="mb-2"><strong>🕓 Office Hours:</strong> Monday to Friday, 8:00 AM – 5:00 PM</p>

        <hr>
        <h5>Find Us on Map:</h5>
        <div class="ratio ratio-16x9 mt-3">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.904309522572!2d124.328!3d10.149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33ab6a3dfb4a20d7%3A0xf5bb1e9d3c0f7c4a!2sBalintawak%2C%20Talibon%2C%20Bohol!5e0!3m2!1sen!2sph!4v1716035034513!5m2!1sen!2sph"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>
</div>
@endsection
