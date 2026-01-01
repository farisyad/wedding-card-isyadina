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
    <link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Fraunces' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta charset="UTF-8">
    <title>Isyadina & Faris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div id="snow"></div>


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
                        <span class="small">AHAD</span>
                    </div>

                    <div class="divider"></div>

                    <div class="date-center">
                        <span class="month">MEI</span>
                        <span class="day">24</span>
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

            <section class="section invitation2 reveal fade-up" style="padding-top: 0;">
                <img src="/images/salam.png" class="invitation-img salam animate">

                <p class="intro" style="margin: 0px 0px; margin-bottom: 28px;" >
                    Dengan penuh kesyukuran:
                </p>

                <div class="parents" style="font-family: 'Krub'; color: #765b3c;">
                    <p>
                        <p>MUHAMAD ZAHIR BIN MAHMUD</p>
                        <p class="ayahibu-pengantin">(Ayah Pengantin Perempuan)</p>
                        &<br>
                        <p style="margin:0px;">NAZHATULSIMA BINTI ABDULLAH</p>
                        <p class="ayahibu-pengantin">(Ibu Pengantin Perempuan)</p>
                    </p>

                    <p class="and" style="font-size: 14px;">BERSAMA</p>

                    <p>
                        <p>MOHAMAD FAIZ BIN ABD MANAN</p>
                        <p class="ayahibu-pengantin">(Ayah Pengantin Lelaki)</p>
                        &
                        <p style="margin-top: 0;">MARIAM BINTI SALLEH</p>
                        <p class="ayahibu-pengantin">(Ibu Pengantin Lelaki)</p>
                    </p>
                </div>

                <p class="kata-jemputan">Menjemput yang berbahagia Tan Sri/ Puan Sri/ Dato’ Seri/Datin Seri/ Dato’/ Datin/ Profesor/ Profesor Madya/ Doktor/ Tuan/ Puan/ Cik <br><br>

-------------------------------------------------- <br> 
Serta Keluarga ke Majlis Perkahwinan anakanda kami</p>

                <p class="couple-name">
                    Mohamad Faris Irsyad Bin Mohamad Faiz
                    <p>dengan pilihan hatinya</p>
                    <p class="couple-name">Nurdina Zahira Binti Muhamad Zahir</p>
                </p>
            </section>

            <img src="/images/palang.png" class="invitation-img palang animate">

            <section class="section event-details reveal fade-up">
                <div class="event-info">
                    <img src="/images/calendar-icon.png" class="invitation-img calendar-icon animate">
                    <p class="event-date">24 MEI 2026</p>
                    <img src="/images/time-icon.png" class="invitation-img time-icon animate">
                    <p class="event-time">12.00 Tengah Hari – 4.30 Petang</p>
                    <img src="/images/map-icon.png" class="invitation-img map-icon animate">
                    <p class="event-venue">Pendang Lake Resort</p>
                </div>

                <h3 class="section-title" style="margin-top: 35px;">Aturcara Majlis</h3>
                
                <div class="schedule">

                        <span class="time-schedule">12:00 PM</span>
                        <span class="activity-schedule">Ketibaan Tetamu</span>
                        <div class="divider" style="height: 45px;"></div>
                        <span class="time-schedule">1:00 PM</span>
                        <span class="activity-schedule">Ketibaan Pengantin</span>
                        <div class="divider" style="height: 45px;"></div>
                        <span class="time-schedule">4:30 PM</span>
                        <span class="activity-schedule">Majlis Bersurai</span>
                    
                </div>
            </section>

            <img src="/images/palang.png" class="invitation-img palang animate">

            <section class="section doa-countdown reveal fade-up">
                <img src="/images/bismillah-countdown.png" class="invitation-img bismillah-countdown animate">

                <p class="doa-text">
                <strong>Ya Allah</strong><br>
                Berkatilah majlis pernikahan mereka. Satukanlah hati kedua mempelai ini seperti mana Engkau satukan hati Adam dan Hawa dan seperti Engkau satukan hati Muhammad S.A.W dan Siti Khadijah. Semoga Allah S.W.T memberkati mereka serta menghimpunkan mereka kebaikan dan keberkatan didunia dan diakhirat
                </p>

                <img src="/images/palang.png" class="invitation-img palang animate">

                <h3 class="section-title">Majlis Akan Bermula</h3>

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

                <img src="/images/palang.png" class="invitation-img palang animate">

                <button class="open-rsvp-btn" onclick="openRsvpModal()">
                        Sahkan Kehadiran
                </button>
            </section>

            <section class="section ucapan-list">
                <h3 class="section-title" style="font-family: 'Fraunces'">Ucapan</h3>

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

            <section class="close-cover">
            <img src="/images/close-cover.png" class="invitation-img close-cover animate">

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
let autoScrollActive = true;
let resumeTimer = null;
let scrollDuration = 150000; // total scroll duration
let remainingDuration = scrollDuration;

/* USER INTERACTION DETECTOR */
function pauseAutoScroll() {
    autoScrollActive = false;

    // Clear existing resume timer
    if (resumeTimer) clearTimeout(resumeTimer);

    // Resume after user idle (seconds)
    resumeTimer = setTimeout(() => {
        autoScrollActive = true;
        autoScrollToBottom(remainingDuration);
    }, 4000); // ⏳ 4 seconds idle
}

['wheel', 'touchstart', 'keydown'].forEach(evt => {
    window.addEventListener(evt, pauseAutoScroll);
});

/* AUTO SCROLL FUNCTION */
function autoScrollToBottom(duration = 90000) {
    const start = window.scrollY;
    const end = document.documentElement.scrollHeight - window.innerHeight;
    const distance = end - start;

    let startTime = null;

    function scrollStep(timestamp) {
        if (!autoScrollActive) {
            // Save remaining time
            if (startTime) {
                const elapsed = timestamp - startTime;
                remainingDuration = Math.max(duration - elapsed, 5000);
            }
            return;
        }

        if (!startTime) startTime = timestamp;

        const progress = timestamp - startTime;
        const percent = Math.min(progress / duration, 1);

        window.scrollTo(0, start + distance * percent);

        if (progress < duration) {
            requestAnimationFrame(scrollStep);
        }
    }

    requestAnimationFrame(scrollStep);
}



function openInvitation() {

    // OPTIONAL: visual feedback (circle pressed)
    document.querySelector('.center-btn')?.classList.add('pressed');

    // WAIT 3 SECONDS BEFORE STARTING
    

        //  Start music
        document.getElementById('bgMusic')?.play();

        // Open doors
        const cover = document.getElementById('cover');
        cover.classList.add('open');
        

        // After door animation
        setTimeout(() => {
            cover.style.display = 'none';

            const content = document.getElementById('content');
            content.style.display = 'block';
            content.classList.add('show');
            startSnow();

            setTimeout(() => {
                // Start auto scroll
                autoScrollToBottom(scrollDuration);
            }, 3500);

            // ✨ Animate elements
            const items = document.querySelectorAll('.animate');
            items.forEach((el, index) => {
                setTimeout(() => el.classList.add('show'), index * 150);
            });

        }, 1200); // door animation time

    
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

/* FORCE PAGE TO TOP ON LOAD / REFRESH */
window.history.scrollRestoration = 'manual';

window.addEventListener('load', () => {
    window.scrollTo(0, 0);
});

function startSnow() {
    const snowContainer = document.getElementById('snow');
    const MAX_SNOW = 40; // control amount

    function createSnowflake() {
        const snowflake = document.createElement('div');
        snowflake.className = 'snowflake';
        snowflake.innerHTML = '✨';

        const size = Math.random() * 8 + 8;
        const duration = Math.random() * 10 + 15;

        snowflake.style.fontSize = size + 'px';
        snowflake.style.left = Math.random() * 100 + 'vw';
        snowflake.style.animationDuration = duration + 's';
        snowflake.style.opacity = Math.random() * 0.5 + 0.3;

        snowContainer.appendChild(snowflake);

        setTimeout(() => {
            snowflake.remove();
        }, duration * 1000);
    }

    // Initial snow
    for (let i = 0; i < MAX_SNOW / 2; i++) {
        createSnowflake();
    }

    // Continuous snow
    setInterval(() => {
        if (snowContainer.childElementCount < MAX_SNOW) {
            createSnowflake();
        }
    }, 500); // every 0.5s
}

   let lastScrollY = window.scrollY;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                const el = entry.target;
                const scrollingDown = window.scrollY > lastScrollY;

                if (entry.isIntersecting) {
                    el.classList.add('active');

                    // Animate only when scrolling DOWN
                    if (scrollingDown) {
                        el.classList.add('animate');
                    } else {
                        el.classList.remove('animate');
                    }
                } 
                // Out of viewport → hide & reset
                else {
                    el.classList.remove('active', 'animate');
                }
            });

            lastScrollY = window.scrollY;
        },
        {
            threshold: 0.2
        }
    );

    document.querySelectorAll('.reveal').forEach(el => {
        observer.observe(el);
    });
</script>




</body>
</html>
