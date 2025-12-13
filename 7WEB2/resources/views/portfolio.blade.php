<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alonzo</title>

    {{-- Google font --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

    {{-- Vite assets (optional if built or running hot) --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        :root{
            --ocean:#001122;
            --blood:#ff0000;
            --fin:#444;
        }
        *{margin:0;padding:0;box-sizing:border-box}
        body{
            min-height:100vh;
            background:radial-gradient(ellipse at 50% 80%, #001a33 0%, #000 70%);
            font-family:'Montserrat',sans-serif;
            overflow-x:hidden;
            color:#fff;
        }
        /* ---------- portfolio content ---------- */
        .portfolio-content{
            position:absolute;
            top:50%;left:50%;
            transform:translate(-50%,-50%);
            text-align:center;
            z-index:15;
            pointer-events:none;
        }
        .name{
            font-size:clamp(3rem,10vw,8rem);
            text-shadow:0 0 20px rgba(0,255,255,.5);
            display:inline-block;
            position:relative;
            transition:color .5s;
        }
        .name.bloodied{
            color:var(--blood);
            text-shadow:0 0 30px var(--blood),0 0 60px var(--blood);
            animation:bloodDrip 3s ease-in-out;
        }
        @keyframes bloodDrip{
            0%,100%{text-shadow:0 0 20px rgba(255,0,0,.8)}
            50%{text-shadow:0 0 40px #f00,0 0 80px rgba(255,0,0,.8)}
        }
        .tagline{font-size:1.5rem;color:#aaa;margin-bottom:30px;opacity:.9}
        .cta-button{
            display:inline-block;
            padding:15px 40px;
            background:linear-gradient(45deg,#0ff,#09f);
            color:#000;
            text-decoration:none;
            font-weight:bold;
            border-radius:50px;
            pointer-events:all;
            box-shadow:0 5px 20px rgba(0,255,204,.4);
            transition:all .3s;
        }
        .cta-button:hover{transform:scale(1.1);box-shadow:0 8px 30px rgba(0,255,204,.6)}
        /* ---------- warning text ---------- */
        .warning-text{
            position:absolute;
            top:20px;left:50%;transform:translateX(-50%);
            color:var(--blood);font-size:18px;text-shadow:0 0 10px var(--blood);
            z-index:20;transition:all .3s;
        }
        .warning-text.idle{animation:textPulse 2s ease-in-out infinite}
        .warning-text.attack{animation:textFlash .5s ease-in-out infinite;font-size:24px}
        @keyframes textPulse{0%,100%{opacity:.3}50%{opacity:.8}}
        @keyframes textFlash{0%,100%{opacity:1;text-shadow:0 0 20px var(--blood)}50%{opacity:.5;text-shadow:0 0 30px var(--blood),0 0 40px var(--blood)}}
        /* ---------- work section ---------- */
        #work{
            position:absolute;top:100vh;min-height:100vh;width:100%;
            padding:50px;background:#000;color:#fff;z-index:25
        }
        .work-container{max-width:1100px;margin:0 auto;padding-top:2rem}
        #work h2{font-family:'Montserrat',sans-serif;font-size:clamp(2rem,5vw,4rem);text-align:center;margin-bottom:3rem;color:#0ff;text-shadow:0 0 20px rgba(0,255,255,.5)}
        .about-content{display:grid;grid-template-columns:280px 1fr;gap:3rem;align-items:start;margin-bottom:4rem}
        .profile-photo{width:100%;height:280px;object-fit:cover;border-radius:10px;border:3px solid var(--fin);box-shadow:0 0 25px rgba(0,255,255,.3)}
        .about-text{font-size:1.1rem;line-height:1.8;color:#ccc}
        .about-text p{margin-bottom:1.2rem}
        .interests-section h3{font-family:'Montserrat',sans-serif;font-size:clamp(1.5rem,3vw,2.5rem);text-align:center;margin:4rem 0 2rem;color:#0ff}
        .interests-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(350px,1fr));gap:2rem}
        .interest-item{display:flex;align-items:flex-start;gap:1rem;padding:1.5rem;background:rgba(0,17,34,.4);border-radius:10px;border:1px solid rgba(0,255,255,.2);transition:transform .3s, box-shadow .3s}
        .interest-item:hover{transform:translateY(-5px);box-shadow:0 5px 20px rgba(0,255,255,.2)}
        .interest-icon{font-size:2.5rem;filter:drop-shadow(0 0 5px rgba(0,255,255,.5))}
        .interest-text{flex:1;line-height:1.6;color:#ddd}
        .interest-text strong{color:#0ff;font-family:'Montserrat',sans-serif;display:block;margin-bottom:.3rem}
        @media (max-width:768px){
            .about-content{grid-template-columns:1fr;text-align:center}
            .profile-photo{height:250px;width:250px;margin:0 auto}
            .interests-grid{grid-template-columns:1fr}
        }
        @keyframes fadeInContent{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
        .fade-in{opacity:0;animation:fadeInContent 1s ease-out forwards}
        .fade-in-content{opacity:0;animation:fadeInContent 1s ease-out forwards}
        .fade-in:nth-child(1){animation-delay:2.5s}
        .fade-in:nth-child(2){animation-delay:2.7s}
        .fade-in:nth-child(3){animation-delay:2.9s}
        .fade-in:nth-child(4){animation-delay:3.1s}
        .ocean-bg-particles{position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;overflow:hidden;z-index:-1}
        .particle{position:absolute;border-radius:50%;animation:floatParticles 15s infinite linear}
        .small-bubble{width:4px;height:4px;background:radial-gradient(circle,rgba(200,240,255,.4) 0%,transparent 70%);box-shadow:0 0 6px rgba(100,200,255,.3)}
        .medium-bubble{width:8px;height:8px;background:radial-gradient(circle,rgba(180,220,255,.3) 0%,transparent 70%);box-shadow:0 0 10px rgba(80,180,255,.2)}
        @keyframes floatParticles{0%{transform:translateY(100vh) translateX(0) scale(0);opacity:0}10%{opacity:1}90%{opacity:1}100%{transform:translateY(-10vh) translateX(100px) scale(1.2);opacity:0}}
        .highlight{color:#0ff;font-weight:600;text-shadow:0 0 8px rgba(0,255,255,.4);position:relative;display:inline-block}
        .highlight::after{content:"";position:absolute;bottom:-2px;left:0;width:100%;height:2px;background:linear-gradient(90deg,transparent,#0ff,transparent);animation:shimmer 2s infinite}
        @keyframes shimmer{0%{transform:translateX(-100%)}100%{transform:translateX(100%)}}
        /* ---------- ocean / animation layer ---------- */
        .ocean{position:absolute;width:100%;height:100vh;z-index:10}
        .ocean-effects{position:absolute;inset:0;z-index:0;overflow:hidden;pointer-events:none}
        .waves,.caustics{display:none}
        /* ---------- platform ---------- */
        .platform{
            position:absolute;top:50px;left:50%;transform:translateX(-50%);
            width:200px;height:20px;
            background:linear-gradient(to bottom,#8B4513,#654321);
            border:3px solid #333;border-radius:5px;
            box-shadow:0 5px 15px rgba(0,0,0,.8);z-index:11
        }
        /* ---------- lady ---------- */
        .lady{
            position:absolute;top:-60px;left:50%;transform:translateX(-50%);
            z-index:12;transition:all .3s;
        }
        .lady-head{width:20px;height:20px;background:radial-gradient(circle,#fdbcb4,#e6a192);border-radius:50%;margin:0 auto;border:2px solid #333}
        .lady-body{width:25px;height:35px;background:linear-gradient(to bottom,#ff69b4,#ff1493);border-radius:10px 10px 5px 5px;margin-top:2px}
        .lady-arms{position:absolute;top:25px;left:-5px;width:35px;height:3px;background:#fdbcb4;border-radius:50%}
        .lady-legs{display:flex;justify-content:center;gap:5px;margin-top:2px}
        .leg{width:4px;height:15px;background:#333;border-radius:2px}
        .lady.frightened{animation:shake .1s linear infinite}
        @keyframes shake{0%,100%{transform:translateX(-50%) translateY(0)}25%{transform:translateX(-52%) translateY(-2px)}75%{transform:translateX(-48%) translateY(-2px)}}
        .diver{position:absolute;width:52px;height:110px;left:75%;top:72%;transform:translate(-50%,-50%);z-index:12;animation:diverBob 3s ease-in-out infinite alternate}
        .diver-inner{position:relative;width:100%;height:100%}
        .diver-head{position:relative;width:26px;height:26px;background:#222;border-radius:50%;margin:0 auto;border:2px solid #88a}
        .diver-mask{position:absolute;left:2px;top:6px;width:22px;height:12px;background:#093b4c;border-radius:6px;border:2px solid #66a}
        .reg{position:absolute;left:20px;top:12px;width:8px;height:8px;background:#111;border-radius:50%;border:2px solid #333}
        .hose{position:absolute;left:8px;top:22px;width:18px;height:2px;background:#333;transform:rotate(25deg)}
        .diver-body{position:relative;width:28px;height:44px;background:#0a0a0a;border-radius:8px;margin:6px auto;border:2px solid #333}
        .stripe{position:absolute;left:4px;top:10px;width:20px;height:4px;background:#1e90ff;border-radius:3px}
        .diver-tank{width:18px;height:32px;background:#777;margin:4px auto;border-radius:4px;border:2px solid #555}
        .diver-arms{position:absolute;left:50%;top:54px;transform:translateX(-50%);width:44px;height:20px}
        .arm{position:absolute;width:16px;height:4px;background:#0a0a0a;border:2px solid #333;border-radius:3px}
        .arm.left{left:-4px;top:4px}
        .arm.right{right:-4px;top:4px}
        .arm.left{animation:armLeft .9s ease-in-out infinite alternate}
        .arm.right{animation:armRight .9s ease-in-out infinite alternate}
        @keyframes armLeft{from{transform:rotate(-8deg)}to{transform:rotate(-18deg)}}
        @keyframes armRight{from{transform:rotate(8deg)}to{transform:rotate(18deg)}}
        .diver-legs{position:absolute;left:50%;top:86px;transform:translateX(-50%);display:flex;gap:6px}
        .diver-legs .leg{position:relative;width:8px;height:18px;background:#0a0a0a;border:2px solid #333;border-radius:3px;animation:legKick .9s ease-in-out infinite alternate}
        @keyframes legKick{from{transform:translateY(0)}to{transform:translateY(-3px)}}
        .diver-legs .leg .fin{position:absolute;left:-2px;bottom:-8px;width:0;height:0;border-top:16px solid #ffcc00;border-left:12px solid transparent;border-right:12px solid transparent;filter:drop-shadow(0 0 4px #ffcc00);transform-origin:top center;animation:finKick .9s ease-in-out infinite alternate}
        @keyframes finKick{0%{transform:rotate(6deg)}100%{transform:rotate(-6deg)}}
        @keyframes diverBob{from{top:72%}to{top:71%}}
        .bubbles{position:absolute;left:50%;top:6px;transform:translateX(-50%);width:40px;height:70px;pointer-events:none}
        .bubble{position:absolute;left:20px;bottom:0;width:6px;height:6px;border:1px solid #aee;border-radius:50%;background:rgba(200,240,255,.25);animation:bubbleUp 3s ease-in infinite}
        @keyframes bubbleUp{0%{transform:translateY(0) scale(.8);opacity:.7}100%{transform:translateY(-70px) scale(1.2);opacity:0}}
        .diver.consumed{opacity:.95;transition:transform .6s ease, opacity .6s ease;animation:none}
        .diver.eaten{animation:fadeOut 1.2s ease forwards;filter:grayscale(1)}
        @keyframes fadeOut{to{opacity:0;transform:translate(-50%,-40%) scale(.8)}}
        /* ---------- shark ---------- */
        .shark{
            position:absolute;width:190px;height:110px;
            filter:drop-shadow(0 0 10px rgba(200,0,0,.35));
            z-index:13;transition:none;will-change:transform;
        }
        .diver{will-change:transform,left}
        .diver.consumed{position:fixed}
        .shark-body{width:150px;height:78px;background:linear-gradient(90deg,#1f2327,#0a0c0e);border-radius:62% 25% 46% 22%;position:relative;border:2px solid #191b1d;box-shadow:inset 0 -8px 12px rgba(0,0,0,.6)}
        .shark-fin{position:absolute;width:0;height:0;border-left:22px solid transparent;border-right:22px solid transparent;border-bottom:44px solid #0f1113;top:-24px;left:46px;transform:rotate(28deg)}
        .snout{position:absolute;left:-8px;top:16px;width:0;height:0;border-top:18px solid transparent;border-bottom:18px solid transparent;border-right:44px solid #171a1d}
        .jaw{position:absolute;left:18px;bottom:-8px;width:92px;height:26px;background:#0b0c0e;border:2px solid #222;border-radius:0 0 28px 28px;box-shadow:inset 0 -6px 10px rgba(0,0,0,.6)}
        .gills{position:absolute;left:56px;top:22px;width:22px;height:14px}
        .gills .line{position:absolute;width:18px;height:2px;background:#1e2125;border-radius:2px}
        .gills .l1{top:0}
        .gills .l2{top:6px;width:16px}
        .gills .l3{top:12px;width:14px}
        .pectoral{position:absolute;width:0;height:0;border-top:18px solid #0f1113;border-left:22px solid transparent;border-right:22px solid transparent}
        .pectoral.left{left:36px;bottom:-10px;transform:rotate(14deg);animation:pectoralSwim 1.4s ease-in-out infinite alternate}
        .pectoral.right{left:72px;bottom:-10px;transform:rotate(-12deg);animation:pectoralSwim 1.4s ease-in-out infinite alternate}
        @keyframes pectoralSwim{from{filter:brightness(1)}to{filter:brightness(1.1)}}
        .pectoral::before{content:"";position:absolute;top:-2px;left:-6px;width:12px;height:8px;background:#0f1113;border-radius:6px}
        .shark-tail{position:absolute;width:0;height:0;border-top:30px solid transparent;border-bottom:30px solid transparent;border-right:50px solid #000;right:-40px;top:0;animation:tailSwish .5s ease-in-out infinite alternate}
        .shark-tail::before{content:"";position:absolute;left:-10px;top:22px;width:14px;height:10px;background:#000;border-radius:6px}
        @keyframes tailSwish{0%{transform:rotate(-5deg)}100%{transform:rotate(5deg)}}
        .shark-eye{position:absolute;width:12px;height:12px;background:radial-gradient(circle,#ff1c1c,#2a0000);border-radius:50%;left:22px;top:16px;box-shadow:0 0 12px #c00;animation:eyePulse 1.2s ease-in-out infinite}
        @keyframes eyePulse{0%{transform:scale(1);box-shadow:0 0 8px #c00}50%{transform:scale(1.15);box-shadow:0 0 14px #ff2a2a}100%{transform:scale(1);box-shadow:0 0 8px #c00}}
        .teeth{position:absolute;bottom:14px;left:34px;display:flex;gap:4px}
        .tooth{width:0;height:0;border-left:4px solid transparent;border-right:4px solid transparent;border-top:10px solid #fff;filter:drop-shadow(0 0 3px rgba(255,255,255,.2))}
        .teeth.bottom{bottom:2px;left:38px}
        .tooth:nth-child(odd){border-top-color:#eee}
        .scars{position:absolute;left:70px;top:20px;width:60px;height:34px;pointer-events:none}
        .scar{position:absolute;width:26px;height:3px;background:#1a1d20;border-radius:3px;transform:rotate(-18deg)}
        .scar.s2{left:12px;top:10px;width:20px;transform:rotate(-12deg)}
        .scar.s3{left:20px;top:20px;width:16px;transform:rotate(-6deg)}
        .spikes{position:absolute;left:46px;top:-12px;display:flex;gap:6px}
        .spike{width:0;height:0;border-left:8px solid transparent;border-right:8px solid transparent;border-bottom:18px solid #0f1113;filter:drop-shadow(0 0 2px #000)}
        .maw-blood{position:absolute;left:24px;bottom:-6px;width:90px;height:26px;background:radial-gradient(ellipse at 50% 0%, rgba(180,0,0,.6), transparent 60%);pointer-events:none}
        .maw-blood::after{content:"";position:absolute;left:40px;top:0;width:6px;height:14px;background:linear-gradient(#b00,#700);border-radius:4px;animation:drip 1.6s ease-in-out infinite}
        @keyframes drip{0%{transform:translateY(0);opacity:.9}100%{transform:translateY(8px);opacity:.2}}
        .shark.chomp .jaw{animation:jawOpen .25s ease-in-out infinite alternate}
        @keyframes jawOpen{from{transform:translateY(0)}to{transform:translateY(6px)}}
        .shark.chomp .shark-body{animation:chomp .25s ease-in-out infinite}
        @keyframes chomp{0%,100%{transform:translateY(0)}50%{transform:translateY(-3px)}}
        /* ---------- idle blood trail ---------- */
        .idle-blood-particle{position:absolute;width:3px;height:3px;background:var(--blood);border-radius:50%;opacity:.6;animation:idleFadeOut 4s ease-out forwards}
        @keyframes idleFadeOut{to{opacity:0;transform:translateY(50px) scale(.5)}}
        /* ---------- blood splatter on name ---------- */
        .blood-drop{position:absolute;width:8px;height:8px;background:radial-gradient(circle,var(--blood),#900);border-radius:50%;opacity:0;animation:splatter 2s ease-out forwards}
        @keyframes splatter{
            0%{opacity:1;transform:translate(0,0) scale(0)}
            50%{opacity:1;transform:translate(var(--x),var(--y)) scale(1.5)}
            100%{opacity:.7;transform:translate(var(--x),calc(var(--y) + 100px)) scale(1);filter:blur(2px)}
        }
        /* ---------- attack red flash ---------- */
        .attack-flash{position:absolute;width:100%;height:100%;background:radial-gradient(circle,rgba(255,0,0,.3),transparent 70%);opacity:0;pointer-events:none;z-index:5;transition:opacity .3s}
        .attack-flash.active{opacity:1;animation:flashPulse .5s ease-in-out}
        @keyframes flashPulse{0%,100%{opacity:0}50%{opacity:1}}
        .fade-overlay{position:fixed;top:0;left:0;width:100%;height:100%;background:#000;opacity:0;pointer-events:none;z-index:100;transition:opacity 2s ease-in-out}
        .fade-overlay.active{opacity:1}
    </style>
</head>
<body>

<!-- Portfolio headline & button -->
<div class="portfolio-content">
    <h1 class="name" id="name">Adrian f Alonzo</h1>
    <p class="tagline">Hello this is my simple portfolio</p>
    <a href="#work" class="cta-button" id="workButton">See my work</a>
</div>

<!-- Warning text -->
<div class="warning-text idle" id="warningText">● SHARK PATROLLING ●</div>

<!-- Work section (scroll target) -->
<section id="work">
    <div class="ocean-bg-particles" id="oceanParticles"></div>
    <div class="work-container fade-in-content">
        <h2 class="fade-in">About Me</h2>
        <div class="about-content fade-in">
            <div class="photo-wrapper">
                <img src="https://lh7-rt.googleusercontent.com/sitesz/AClOY7o-NO_LPK6huhzvIQXpnG5AOGgtLRohV6jLP8tlaXKM_gekRVCk1zKXKIQ57pQxE5bbhEjjHpxqEyNLfWvbHbzYEMlli2NY6OLuh7cKZj-V7jnBefwC1Ca6kdVy9O-Sw2Uo_kjwHGzhNkgVg3osqrfWsMoLTaju6uZj4PCGG-0ka3Mg-_fq?key=VIq-wpVP9dF_IwY-9XA4MQ" alt="Profile Photo" class="profile-photo">
            </div>
            <div class="about-text">
                <p>Hello my name is <span class="highlight">Adrian f Alonzo</span> – a weekend warrior and digital adventurer. I live for the thrill of exploring open worlds, both virtual and real. Whether I'm tearing through night highways, crushing trails from Friday to Monday, or binge-reading the latest manhwa drops, I'm always chasing that next adrenaline hit.</p>
                <p>Gaming's my main jam – I've platinumed Ghost of Tsushima, raided every corner of Valhalla, and I'm currently getting my ass handed to me in God of War Ragnarok's hardest difficulty. War Thunder? Let's just say my tank crew knows the bitter taste of defeat all too well.</p>
                <p>When I'm not respawning, you'll catch me: <span class="highlight">biking trails on weekends</span>, <span class="highlight">riding my motorcycle at night</span>, or <span class="highlight">reading manhwa until 3 AM</span> (Solo Leveling got me hooked bad).</p>
                <p>Right now, I'm just hunting for my next big obsession – whether it's a new game drop, a fresh trail to conquer, or the latest chapter release that everyone's screaming about.</p>
            </div>
        </div>
        <div class="interests-section fade-in">
            <h3>Creative Playground</h3>
            <div class="interests-grid">
                <div class="interest-item fade-in">
                    <div class="interest-icon">🎮</div>
                    <div class="interest-text"><strong>Gaming:</strong> I've platinumed Ghost of Tsushima, raided every corner of Valhalla, and I'm currently getting my ass handed to me in God of War Ragnarok's hardest difficulty. War Thunder? Let's just say my tank crew knows the bitter taste of defeat all too well.</div>
                </div>
                <div class="interest-item fade-in">
                    <div class="interest-icon">🚴</div>
                    <div class="interest-text"><strong>Biking:</strong> I bike trails on weekends. It's how I stay active and clear my head. My weekends are basically pedal-powered therapy sessions.</div>
                </div>
                <div class="interest-item fade-in">
                    <div class="interest-icon">🏍️</div>
                    <div class="interest-text"><strong>Motorcycle:</strong> I ride my motorcycle at night. Empty highways with city lights blurring is my favorite vibe. Just me, my bike, and the open road.</div>
                </div>
                <div class="interest-item fade-in">
                    <div class="interest-icon">📚</div>
                    <div class="interest-text"><strong>Reading:</strong> Manhwa addict – Solo Leveling is what got me started, now I'm deep in the webtoon rabbit hole. My reading list is 80% Korean comics, 20% "I'll get to it eventually" promises.</div>
                </div>
            </div>
        </div>
    </div>
 </section>

<!-- Ocean animation layer -->
    <div class="ocean">
        <div class="ocean-effects"><div class="waves"></div><div class="waves"></div><div class="caustics"></div></div>
        <div class="platform"></div>

    <!-- Lady on platform -->
    <div class="lady" id="lady">
        <div class="lady-head"></div>
        <div class="lady-body"></div>
        <div class="lady-arms"></div>
        <div class="lady-legs"><div class="leg"></div><div class="leg"></div></div>
    </div>

    <div class="diver" id="diver">
        <div class="diver-inner">
            <div class="diver-head">
                <div class="diver-mask"></div>
                <div class="reg"></div>
            </div>
            <div class="hose"></div>
            <div class="diver-body"><div class="stripe"></div></div>
            <div class="diver-tank"></div>
            <div class="diver-arms"><div class="arm left"></div><div class="arm right"></div></div>
            <div class="diver-legs">
                <div class="leg left"><div class="fin"></div></div>
                <div class="leg right"><div class="fin"></div></div>
            </div>
            <div class="bubbles"><div class="bubble" style="left:18px;animation-delay:.0s"></div><div class="bubble" style="left:22px;animation-delay:.8s"></div><div class="bubble" style="left:16px;animation-delay:1.5s"></div></div>
        </div>
    </div>

    <!-- Idle blood particles container -->
    <div class="idle-blood-trail" id="idleBloodTrail"></div>

    <!-- Attack red flash -->
    <div class="attack-flash" id="attackFlash"></div>

    <!-- Shark -->
    <div class="shark" id="shark">
        <div class="shark-body">
            <div class="snout"></div>
            <div class="shark-fin"></div>
            <div class="spikes"><div class="spike"></div><div class="spike"></div><div class="spike"></div></div>
            <div class="shark-eye"></div>
            <div class="gills"><div class="line l1"></div><div class="line l2"></div><div class="line l3"></div></div>
            <div class="scars"><div class="scar"></div><div class="scar s2"></div><div class="scar s3"></div></div>
            <div class="jaw"></div>
            <div class="maw-blood"></div>
            <div class="teeth"><div class="tooth"></div><div class="tooth"></div><div class="tooth"></div><div class="tooth"></div><div class="tooth"></div></div>
            <div class="teeth bottom"><div class="tooth"></div><div class="tooth"></div><div class="tooth"></div><div class="tooth"></div><div class="tooth"></div></div>
            <div class="pectoral left"></div>
            <div class="pectoral right"></div>
        </div>
        <div class="shark-tail"></div>
    </div>
</div>

<!-- Blood splatter on name -->
<div class="blood-splatter" id="bloodSplatter"></div>

<!-- Fullscreen fade overlay -->
<div class="fade-overlay" id="fadeOverlay"></div>

<script>
/* ---------- elements ---------- */
const shark      = document.getElementById('shark');
const lady       = document.getElementById('lady');
const diver      = document.getElementById('diver');
const name       = document.getElementById('name');
const bloodTray  = document.getElementById('idleBloodTrail');
const bloodName  = document.getElementById('bloodSplatter');
const flash      = document.getElementById('attackFlash');
const warn       = document.getElementById('warningText');
const btn        = document.getElementById('workButton');
const bubblesBox = diver.querySelector('.bubbles');
const oceanParticlesBox = document.getElementById('oceanParticles');
setInterval(()=>{
    const b = document.createElement('div');
    b.className = 'bubble';
    b.style.left = (16 + Math.random()*10) + 'px';
    b.style.animationDelay = (Math.random()*1.5) + 's';
    bubblesBox.appendChild(b);
    setTimeout(()=>b.remove(),3000);
}, 1600);

/* ---------- shark AI vars ---------- */
let mode      = 'patrol';          // patrol | attack
let x         = -200;                // start off-screen left
let y         = Math.random()*(innerHeight-100);
let spdX      = 2;
let spdY      = (Math.random()-0.5)*1.5;
let tSpdX     = spdX;
let tSpdY     = spdY;
let dir       = 1;                 // 1 right, -1 left
let cd        = 0;                 // attack cooldown frames

const px = innerWidth/2;           // platform center
const py = 50;
let currentTarget = null;
let eatOnContact  = false;
let eating        = false;
let driftT        = 0;
let frame         = 0;
let lockWork      = false;
const workEl      = document.getElementById('work');
let workTop       = 0;
let diverConsumed = false;
let diverX        = 75;   // percent
let dVX           = 0;
function updateWorkTop(){ workTop = workEl.offsetTop; }
window.addEventListener('resize', updateWorkTop);
updateWorkTop();

function keepAtWork(){
    if(!lockWork) return;
    if(scrollY < workTop){ scrollTo(0, workTop); }
}
function keepAtWorkWheel(e){
    if(!lockWork) return;
    if(e.deltaY < 0 && scrollY <= workTop){ e.preventDefault(); scrollTo(0, workTop); }
}
function spawnOceanParticles(){
    if(!oceanParticlesBox) return;
    oceanParticlesBox.innerHTML = '';
    const count = 50;
    for(let i=0;i<count;i++){
        const p = document.createElement('div');
        p.className = 'particle ' + (Math.random()<0.6? 'small-bubble' : 'medium-bubble');
        p.style.left = Math.round(Math.random()*100) + 'vw';
        p.style.top  = '100vh';
        p.style.animationDelay = (Math.random()*10) + 's';
        p.style.animationDuration = (12 + Math.random()*8) + 's';
        oceanParticlesBox.appendChild(p);
    }
}
function lockToWork(){
    lockWork = true;
    updateWorkTop();
    const overlay = document.getElementById('fadeOverlay');
    overlay.classList.add('active');
    setTimeout(()=>{
        scrollTo({ top: workTop });
        overlay.style.transition = 'opacity 0.5s ease-out';
        overlay.classList.remove('active');
    },2000);
    setTimeout(()=>{
        overlay.style.transition = '';
        document.querySelectorAll('.fade-in, .fade-in-content').forEach(el=>{ el.style.opacity='0'; });
        spawnOceanParticles();
    },2500);
    window.addEventListener('scroll', keepAtWork);
    window.addEventListener('wheel', keepAtWorkWheel, { passive: false });
}

/* ---------- util ---------- */
function rand(min,max){return Math.random()*(max-min)+min}

/* ---------- idle blood trail ---------- */
function drip(x,y){
    const p = document.createElement('div');
    p.className = 'idle-blood-particle';
    p.style.left = x + 'px';
    p.style.top  = y + 'px';
    bloodTray.appendChild(p);
    setTimeout(()=>p.remove(),4000);
}

/* ---------- blood on name ---------- */
function splashName(){
    name.classList.add('bloodied');
    const rect = name.getBoundingClientRect();
    for(let i=0;i<20;i++){
        const d = document.createElement('div');
        d.className = 'blood-drop';
        const ox = rand(-150,150), oy = rand(-50,50);
        d.style.left = (rect.left + rect.width/2 + ox) + 'px';
        d.style.top  = (rect.top  + rect.height/2 + oy) + 'px';
        d.style.setProperty('--x', ox*0.5+'px');
        d.style.setProperty('--y', oy*0.5+'px');
        bloodName.appendChild(d);
        setTimeout(()=>d.remove(),2000);
    }
    setTimeout(()=>name.classList.remove('bloodied'),3000);
}

function center(el){
    const r = el.getBoundingClientRect();
    return { x: r.left + r.width/2, y: r.top + r.height/2 };
}

function splashAround(el){
    const r = el.getBoundingClientRect();
    for(let i=0;i<12;i++){
        const d = document.createElement('div');
        d.className = 'blood-drop';
        const ox = rand(-60,60), oy = rand(-40,40);
        d.style.left = (r.left + r.width/2 + ox) + 'px';
        d.style.top  = (r.top  + r.height/2 + oy) + 'px';
        d.style.setProperty('--x', ox+'px');
        d.style.setProperty('--y', oy+'px');
        bloodName.appendChild(d);
        setTimeout(()=>d.remove(),2000);
    }
}

function attackTarget(targetEl, eat){
    if(cd>0)return;
    mode = 'attack';
    currentTarget = targetEl;
    eatOnContact  = !!eat;
    warn.textContent = '!!! ATTACKING !!!';
    warn.className   = 'warning-text attack';
    flash.classList.add('active');
    lady.classList.add('frightened');
    const c = center(targetEl);
    const dx = c.x - x - 90;
    const dy = c.y - y + 50;
    const dist = Math.hypot(dx,dy) || 1;
    tSpdX = (dx/dist)*14;
    tSpdY = (dy/dist)*14;
}

function eatTarget(targetEl){
    if(eating)return;
    eating = true;
    spdX = 0; spdY = 0;
    shark.classList.add('chomp');
    const s = shark.getBoundingClientRect();
    const mouthX = s.left + (dir===1? 90 : 50);
    const mouthY = s.top  + 50;
    targetEl.classList.add('consumed');
    targetEl.style.left = mouthX + 'px';
    targetEl.style.top  = mouthY + 'px';
    const inner = targetEl.querySelector('.diver-inner');
    if(inner){ inner.style.transform = `scale(.65) rotate(18deg)`; }
    diverConsumed = (targetEl===diver);
    setTimeout(()=>{ splashAround(targetEl); targetEl.classList.add('eaten'); }, 600);
    setTimeout(()=>{
        shark.classList.remove('chomp');
        targetEl.classList.remove('eaten');
        if(targetEl === diver){ targetEl.style.display = 'none'; targetEl.classList.remove('consumed'); const inner = targetEl.querySelector('.diver-inner'); if(inner){ inner.style.transform = ''; } }
        mode = 'patrol';
        currentTarget = null;
        eating = false;
        warn.textContent = '● SHARK PATROLLING ●';
        warn.className   = 'warning-text idle';
        flash.classList.remove('active');
        lady.classList.remove('frightened');
        cd = 300;
        if(targetEl === diver){ lockToWork(); }
    }, 1800);
}

/* ---------- attack routine ---------- */
function attack(){
    if(cd>0)return;                 // still on cooldown
    mode = 'attack';
    warn.textContent = '!!! ATTACKING !!!';
    warn.className   = 'warning-text attack';
    flash.classList.add('active');
    lady.classList.add('frightened');

    // aim at platform
    const dx = px - x - 90;
    const dy = py - y + 50;
    const dist = Math.hypot(dx,dy);
    spdX = (dx/dist)*15;
    spdY = (dy/dist)*15;

    splashName();                   // blood on Alonzo

    // return to patrol after bite
    setTimeout(()=>{
        mode = 'patrol';
        warn.textContent = '● SHARK PATROLLING ●';
        warn.className   = 'warning-text idle';
        flash.classList.remove('active');
        lady.classList.remove('frightened');
        cd = 300;                   // 5 sec @ 60fps
    },2000);
}

/* ---------- main loop ---------- */
function loop(){
    if(cd>0)cd--;
    if(mode==='patrol'){
        // random behaviour
        if(frame%30===0) tSpdY = rand(-1.2,1.2);
        if(frame%50===0) tSpdX = rand(-2.2,2.2);
        if(Math.abs(tSpdX)<1.2) tSpdX = tSpdX>0?1.4:-1.4;
        // idle blood
        if(Math.random()<.03)drip(x+60,y+30);
        // random aggression
        if(cd===0&&Math.random()<.004){
            const dLady = Math.hypot(px-x-90,py-y+50);
            if(dLady<600)attack();
        }
        if(cd===0 && (frame%4===0)){
            const c = center(diver);
            const dDiver = Math.hypot(c.x - x - 90, c.y - y + 50);
            if(dDiver < 480 && Math.random()<.02) attackTarget(diver,true);
        }
        // wrap screen
        if(x>innerWidth+200)x=-200; else if(x<-200)x=innerWidth+200;
        if(y<=0||y>=innerHeight-100)tSpdY*=-1;
    } else {
        if(currentTarget && eatOnContact && !eating){
            const c = center(currentTarget);
            const dist = Math.hypot(c.x - x - 90, c.y - y + 50);
            if(dist < 40) eatTarget(currentTarget);
        }
        if(currentTarget && !eating){
            const c = center(currentTarget);
            const dx = c.x - x - 90;
            const dy = c.y - y + 50;
            const d  = Math.hypot(dx,dy) || 1;
            tSpdX = (dx/d)*14;
            tSpdY = (dy/d)*14;
        } else if(eating){
            tSpdX = 0; tSpdY = 0;
        }
    }
    if(eating){ spdX = 0; spdY = 0; } else {
        spdX += (tSpdX - spdX) * 0.18;
        spdY += (tSpdY - spdY) * 0.18;
    }
    x+=spdX; y+=spdY;
    dir = spdX>0?-1:1;
    // use transform for better performance
    shark.style.setProperty('--sx', dir);
    shark.style.transform = `translate3d(${x}px,${y}px,0) scaleX(${dir})`;
    frame++;
    if(!diverConsumed && diver.style.display !== 'none'){
        if(frame%40===0) dVX += rand(-0.3,0.3);
        const sXPct = (x/innerWidth)*100;
        if(Math.abs(diverX - sXPct) < 10) dVX += (diverX - sXPct) * 0.05;
        dVX *= 0.95;
        diverX += dVX;
        if(diverX < 15) diverX = 15; else if(diverX > 85) diverX = 85;
        diver.style.left = diverX + '%';
    }
    requestAnimationFrame(loop);
}

/* ---------- button / emergency click ---------- */
btn.addEventListener('click',e=>{
    e.preventDefault();
    attackTarget(diver,true);
});
document.addEventListener('click',e=>{if(e.target!==btn&&cd===0)attackTarget(diver,true)});

/* ---------- start ---------- */
loop();
</script>
</body>
</html>