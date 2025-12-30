@php
use App\Models\Rsvp;

$ucapanList = Rsvp::whereNotNull('message')
    ->where('message', '!=', '')
    ->latest()
    ->get();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Krub' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cormorant Garamond' rel='stylesheet'>
    <meta charset="UTF-8">
    <title>Isyadina & Faris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            font-family: 'Georgia', serif;

        }

        /* COVER */
        #cover {
            position: fixed;
            inset: 0;
            z-index: 999;
            overflow: hidden;
        }

        /* BLURRED BACKGROUND */
        #cover::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('/images/cover-bg.png') center/cover no-repeat;

            filter: blur(12px);
            transform: scale(1.1);

            transition:
                filter 0.8s ease,
                opacity 0.8s ease;

            z-index: -1;
        }

        #cover.open::before {
            filter: blur(0);
            opacity: 0;
        }



        /* DOORS */
        .door {
            position: absolute;
            top: 0;
            width: 50%;
            height: 100%;
            background: rgba(255, 255, 255, 0.95);
            transition: transform 1.2s ease-in-out;
            transition-delay: 0.1s;
            z-index: 1;
        }

        .left-door {
            left: 0;
        }

        .right-door {
            right: 0;
        }

        /* CENTER CIRCLE BUTTON */
        .center-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 120px;
            height: 120px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 2;
            box-shadow: 0 12px 30px rgba(0,0,0,0.18);
            overflow: hidden; /* IMPORTANT */
        }

        .center-btn img {
            width: 130%;
            height: 130%;
            object-fit: contain;
            pointer-events: none; /* prevents drag / selection */
        }

        .center-btn:hover {
            transform: translate(-50%, -50%) scale(1.05);
        }

        .center-btn span {
            font-size: 36px;
            font-family: serif;
            color: #6a7a5c;
        }

        /* OPEN STATE */
        #cover.open .left-door {
            transform: translateX(-100%);
        }

        #cover.open .right-door {
            transform: translateX(100%);
        }

        #cover.open .center-btn {
            opacity: 0;
            pointer-events: none;
        }

        /* MAIN CONTENT */
        #content {
            opacity: 0;
            transform: scale(1.15);
            transition: opacity 0.8s ease, transform 1.9s ease;
        }

        
        #content.show {
            opacity: 1;
            transform: scale(1);
        }

        .section {
            max-width: 720px;
            margin: 0 auto;
            padding: 48px 24px;
            text-align: center;
            /* opacity: 0;
            transform: translateY(20px);
            transition: all 1s ease; */
        }

        /* Fade-in after door opens */
        /* .section.show {
            opacity: 1;
            transform: translateY(0);
        } */

        .invitation .arabic {
            font-size: 20px;
            margin-bottom: 24px;
        }

        .invitation .intro {
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 32px;
        }

        .parents p {
            font-size: 15px;
            margin-bottom: 24px;
        }

        .parents .and {
            font-size: 24px;
            margin: 16px 0;
        }

        .couple-name {
            margin-top: 40px;
            font-size: 22px;
            line-height: 1.6;
        }

        .couple-name span {
            font-size: 18px;
        }

        .section.invitation {
            position: relative;
            padding: 80px 24px;

            background-image: url('/images/CARD-BG.png');
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center top;

            text-align: center;
            min-height: 910px;
        }

        .section.invitation {
            text-align: center;
            padding-top: 55px;
        }

        /* universal image centering */
        .invitation-img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
        }

        /* optional fine-tuning */
        .bismillah {
            margin-top: 75px;
            margin-bottom: 16px;
        }

        .names {
            margin-top: 12px;
        }

        .event-date {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 23px;
            margin: 13px 0;
            font-family: 'Krub';
            color: #765b3c;
            font-weight: lighter !important;
        }

        .date-col {
            font-size: 13px;
            letter-spacing: 1px;
        }

        .date-center {
            text-align: center;
            line-height: 1.1;
            display: flex;
            flex-direction: column;
            font-family: 'Krub';
        }

        .date-center .month {
            font-size: 13px;
            letter-spacing: 2px;
        }

        .date-center .day {
            font-size: 33px;
            font-weight: 500;
        }

        /* vertical gold lines */
        .divider {
            width: 2px;
            height: 60px;
            background: #d2a857;
        }

        .quran-verse {
            padding-top: 1px;
        }

        /* initial hidden state */
        .animate {
            opacity: 0;
            transform: translateY(100px);
            transition: all 3s ease;
        }

        /* visible state */
        .animate.show {
            opacity: 1;
            transform: translateY(0);
        }



        /* section - event and details */
        .event-details {
            text-align: center;
        }

        .event-info p {
            margin: 8px 0;
            font-size: 16px;
        }

        .event-date {
            font-weight: bold;
            font-size: 18px;
        }

        .event-venue {
            margin-top: 12px;
            font-style: italic;
        }

        .section-title {
            margin: 40px 0 24px;
            font-size: 20px;
        }

        .schedule {
            list-style: none;
            padding: 0;
            max-width: 400px;
            margin: 0 auto;
        }

        .schedule li {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e6e6e6;
            font-size: 15px;
        }

        .schedule .time {
            font-weight: bold;
        }

        /* Section - Countdown and Doa */
        .doa-countdown {
            text-align: center;
        }

        .doa-text {
            font-size: 15px;
            line-height: 1.8;
            max-width: 640px;
            margin: 0 auto 40px;
        }

        #countdown {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .time-box {
            width: 70px;
            height: 70px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .time-box span {
            font-size: 22px;
            font-weight: bold;
        }

        .time-box small {
            font-size: 12px;
            margin-top: 4px;
        }

        /* RSVP SUMMARY */
        .rsvp-summary {
            text-align: center;
        }

        .rsvp-summary .count {
            font-size: 26px;
            margin: 12px 0 20px;
        }

        .open-rsvp-btn {
            background: #6f6a5a;
            color: #fff;
            border: none;
            padding: 14px 28px;
            border-radius: 30px;
            font-size: 15px;
            cursor: pointer;
        }

        /* MODAL */
        .modal {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            width: 90%;
            max-width: 400px;
        }

        .modal-content h3 {
            text-align: center;
            margin-bottom: 16px;
        }

        .modal-content input,
        .modal-content textarea {
            width: 100%;
            padding: 10px;
            margin: 6px 0 14px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .submit-btn {
            width: 100%;
            background: #6f6a5a;
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 24px;
            cursor: pointer;
        }

        .radio-group {
            display: flex;
            gap: 12px;
            margin: 10px 0 18px;
        }

        .radio-group input {
            display: none;
        }

        .radio-btn {
            flex: 1;
            text-align: center;
            padding: 12px 0;
            border-radius: 10px;
            border: 1.5px solid #ddd;
            font-size: 14px;
            cursor: pointer;
            background: #f8f8f8;
            transition: all .2s ease;
        }

        /* ACTIVE STATE */
        .radio-group input:checked + .radio-btn {
            border-color: #1f2937;
            background: #fff;
            font-weight: 600;
        }

        .modal-content *,
        .modal-content *::before,
        .modal-content *::after {
            box-sizing: border-box;
        }

        /* UCAPAN LIST */
        .ucapan-list {
            max-width: 600px;
            margin: 0 auto;
        }

        .ucapan-item {
            background: #fff;
            border-radius: 12px;
            padding: 14px 16px;
            margin-bottom: 12px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.06);
        }

        .ucapan-item strong {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .ucapan-item p {
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
        }

        .no-ucapan {
            text-align: center;
            color: #777;
        }

        /* wrapper */
.page-wrapper {
    display: flex;
    justify-content: center;
    background: #fdfbf8;
}

/* STATIC background */
.invitation-bg {
    position: fixed;
    top: 0;
    left: 50%;
    transform: translateX(-50%);

    width: 100%;
    max-width: 420px;
    height: 100vh;

    background: url('/images/CARD-BG 2.png') center top / cover no-repeat;

    z-index: 0;
    pointer-events: none;
}

/* content scrolls */
.invitation-card {
    position: relative;
    width: 100%;
    max-width: 420px;
    z-index: 1;
}

    p{
        color: #765b3c;
        font-family: 'Krub';
        font-size: 13px;
    }   

    </style>
</head>
<body>

<!-- COVER -->
<div id="cover">
    <div class="door left-door"></div>
    <div class="door right-door"></div>

    <div class="center-btn" onclick="openInvitation()">
        <img src="/images/Opening-button.png" alt="">
    </div>
</div>


<!-- MUSIC -->
<audio id="bgMusic" loop>
    <source src="/music/song.mp3" type="audio/mpeg">
</audio>

<!-- MAIN CONTENT (EMPTY FOR NOW) -->
<div class="page-wrapper">
    
    <!-- STATIC BACKGROUND -->
    <div class="invitation-bg"></div>
    

    <!-- SCROLLING CONTENT -->
    <div class="invitation-card">
        <div id="content" class="animate-root">
            <section class="section invitation">
                <img src="/images/bismillah.png" class="invitation-img bismillah animate">

                <p class="cover-greeting animate">
                    Please join us to celebrate the wedding of:
                </p>

                <img src="/images/faris-dina-cover1.png" class="invitation-img names animate">

                <div class="event-date animate">
                    <div class="date-col">
                        <span class="small">KHAMIS</span>
                    </div>

                    <div class="divider"></div>

                    <div class="date-center">
                        <span class="month">DEC</span>
                        <span class="day">25</span>
                    </div>

                    <div class="divider"></div>

                    <div class="date-col">
                        <span class="small">12 PM</span>
                    </div>
                </div>

                <div class="quran-verse animate">
                    <p style="font-family:'Cormorant Garamond'; font-size: 15px; padding: 0px 21px; letter-spacing: 1px;">
                       “ And We created pairs of all things so perhaps you would be mindful. “ 
                    </p>
                    <p class="reference" style="font-size: 11px;">
                        (QS Adh-Dhariyat 51:49)
                    </p>

                </div>

            </section>

            <section class="section invitation2">
                <p class="arabic">
                    السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ
                </p>

                <p class="intro">
                    Dengan penuh kesyukuran, kami menjemput
                    Tan Sri / Puan Sri / Dato’ / Datin / Tuan / Puan / Cik
                    seisi keluarga ke majlis perkahwinan anakanda kami
                </p>

                <div class="parents">
                    <p>
                        <strong>Mohamad Faiz bin Abd Manan</strong><br>
                        &<br>
                        <strong>Nama Ibu Pengantin Lelaki</strong>
                    </p>

                    <p class="and">&</p>

                    <p>
                        <strong>Muhamad Zahir bin Mahmud</strong><br>
                        &<br>
                        <strong>Nazhatulsima bt Abdullah</strong>
                    </p>
                </div>

                <h2 class="couple-name">
                    Faris Irsyad bin Mohamad Faiz<br>
                    <span>&</span><br>
                    Isyadina Zahira bt Muhamad Zahir
                </h2>
            </section>

            <section class="section event-details">
                <div class="event-info">
                    <p class="event-date">Ahad, 12 Januari 2025</p>
                    <p class="event-time">12.00 Tengah Hari – 4.30 Petang</p>
                    <p class="event-venue">Dewan Seri Isyadina</p>
                </div>

                <h3 class="section-title">Aturcara Majlis</h3>

                <ul class="schedule">
                    <li>
                        <span class="time">12:00 PM</span>
                        <span class="activity">Ketibaan Tetamu</span>
                    </li>
                    <li>
                        <span class="time">1:00 PM</span>
                        <span class="activity">Ketibaan Pengantin</span>
                    </li>
                    <li>
                        <span class="time">4:30 PM</span>
                        <span class="activity">Majlis Bersurai</span>
                    </li>
                </ul>
            </section>

            <section class="section doa-countdown">
                <p class="arabic">
                    بسم الله الرحمن الرحيم
                </p>

                <p class="doa-text">
                    Ya Allah, berkatilah majlis pernikahan mereka.
                    Satukanlah hati kedua mempelai ini seperti mana Engkau
                    satukan hati Adam dan Hawa.
                    Semoga mereka dikurniakan kebahagiaan,
                    rahmat dan keberkatan di dunia dan akhirat.
                </p>

                <h3 class="section-title">Majlis Akan Bermula Dalam</h3>

                <div id="countdown">
                    <div class="time-box">
                        <span id="days">0</span>
                        <small>Hari</small>
                    </div>
                    <div class="time-box">
                        <span id="hours">0</span>
                        <small>Jam</small>
                    </div>
                    <div class="time-box">
                        <span id="minutes">0</span>
                        <small>Minit</small>
                    </div>
                    <div class="time-box">
                        <span id="seconds">0</span>
                        <small>Saat</small>
                    </div>
                </div>
            </section>

            <section class="section rsvp-summary">
                <h3>Kehadiran</h3>
                <p class="count"><span id="attendanceCount">31</span> orang</p>

                <button class="open-rsvp-btn" onclick="openRsvpModal()">
                    Sahkan Kehadiran
                </button>
            </section>

            <section class="section ucapan-list">
                <h3 class="section-title">Ucapan</h3>

                <div id="ucapanContainer">
                    @forelse ($ucapanList as $u)
                        <div class="ucapan-item">
                            <strong>{{ $u->name }}</strong>
                            <p>{{ $u->message }}</p>
                        </div>
                    @empty
                        <p class="no-ucapan">Belum ada ucapan.</p>
                    @endforelse
                </div>
            </section>


        </div>
    </div>
</div>

<div id="rsvpModal" class="modal">
    <div class="modal-content">
        <h3>Kehadiran / RSVP</h3>

        <form id="rsvpForm">
            @csrf

            <label>Nama</label>
            <input type="text" name="name" required>

            <label>Adakah anda akan hadir?</label>

            <div class="radio-group">
                <input type="radio" id="attend-no" name="attending" value="0" checked>
                <label for="attend-no" class="radio-btn">Tidak</label>

                <input type="radio" id="attend-yes" name="attending" value="1">
                <label for="attend-yes" class="radio-btn">Ya</label>
            </div>



            <label>Bilangan Kehadiran</label>
            <input type="number" name="pax" min="1" value="1">

            <label>Ucapan (Jika ada)</label>
            <textarea name="message"></textarea>

            <button type="submit" class="submit-btn">Hantar</button>
        </form>
    </div>
</div>

<p id="rsvpSuccess" style="display:none; color:green; text-align:center; margin-top:12px;"></p>


<script>
function openInvitation() {
    document.getElementById('bgMusic')?.play();

    const cover = document.getElementById('cover');
    cover.classList.add('open');

    setTimeout(() => {
        cover.style.display = 'none';

        const content = document.getElementById('content');
        content.style.display = 'block';

        // fade in whole content
        content.classList.add('show');

        // stagger inner animations
        const items = document.querySelectorAll('.animate');
        items.forEach((el, index) => {
            setTimeout(() => {
                el.classList.add('show');
            }, index * 150);
        });

    }, 1200);
}



const eventDate = new Date("2026-05-24T12:00:00").getTime();

setInterval(() => {
    const now = new Date().getTime();
    const diff = eventDate - now;

    if (diff <= 0) return;

    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((diff / (1000 * 60)) % 60);
    const seconds = Math.floor((diff / 1000) % 60);

    document.getElementById('days').innerText = days;
    document.getElementById('hours').innerText = hours;
    document.getElementById('minutes').innerText = minutes;
    document.getElementById('seconds').innerText = seconds;
}, 1000);


document.getElementById('rsvpForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const data = new FormData(form);

    fetch('/rsvp', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
        },
        body: data
    })
    .then(res => res.json())
    .then(res => {
        const msg = document.getElementById('rsvpSuccess');
        msg.innerText = res.message;
        msg.style.display = 'block';

        if (res.rsvp.message) {
            const container = document.getElementById('ucapanContainer');

            const div = document.createElement('div');
            div.className = 'ucapan-item';
            div.innerHTML = `
                <strong>${res.rsvp.name}</strong>
                <p>${res.rsvp.message}</p>
            `;

            container.prepend(div);
        }

        form.reset();

        setTimeout(() => {
            closeRsvpModal();
        }, 0);
    });

});


function openRsvpModal() {
    document.getElementById('rsvpModal').classList.add('show');
}

window.addEventListener('click', function(e) {
    const modal = document.getElementById('rsvpModal');
    if (e.target === modal) {
        modal.classList.remove('show');
    }
});

function closeRsvpModal() {
    document.getElementById('rsvpModal').classList.remove('show');
}

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('rsvpModal');

    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            closeRsvpModal();
        }
    });
});


</script>




</body>
</html>
