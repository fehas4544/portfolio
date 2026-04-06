<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $profile->bio ?? 'Professional Software Developer Portfolio' }}">
    <title>{{ $profile->name ?? 'Dev' }} | {{ $profile->role ?? 'Software Developer' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --c-primary:   #0A66C2;
            --c-mid:       #2563EB;
            --c-accent:    #38BDF8;
            --c-bg:        #020c1e;
            --c-bg2:       #071428;
            --c-text:      #e2eeff;
            --c-muted:     #7fa4cc;
            --c-border:    rgba(56,189,248,.18);
            --c-glow:      rgba(37,99,235,.35);
        }
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
        html{scroll-behavior:smooth;}
        body{
            font-family:'Inter',sans-serif;
            background: var(--c-bg);
            color: var(--c-text);
            overflow-x:hidden;
        }
        h1,h2,h3,h4,.font-display{font-family:'Poppins',sans-serif;}

        /* ── Grid BG ── */
        body::before{
            content:'';
            position:fixed;inset:0;
            background-image:
                linear-gradient(rgba(56,189,248,.05) 1px,transparent 1px),
                linear-gradient(90deg,rgba(56,189,248,.05) 1px,transparent 1px);
            background-size:48px 48px;
            pointer-events:none;z-index:0;
            mask-image:radial-gradient(ellipse 80% 80% at 50% 50%,#000 30%,transparent 100%);
        }
        body::after{
            content:'';
            position:fixed;inset:0;
            background:
                radial-gradient(900px 500px at 10% 10%, rgba(10,102,194,.22),transparent 60%),
                radial-gradient(800px 600px at 90% 85%, rgba(56,189,248,.12),transparent 60%);
            pointer-events:none;z-index:0;
        }

        /* ── Particles ── */
        #particles{position:fixed;inset:0;pointer-events:none;z-index:1;overflow:hidden;}
        .particle{
            position:absolute;bottom:-10px;border-radius:50%;
            background:radial-gradient(circle,rgba(255,255,255,.9),rgba(56,189,248,.2) 60%,transparent);
            animation:pfloat var(--dur,18s) linear infinite;
            animation-delay:var(--delay,0s);
            opacity:var(--op,.3);
        }
        @keyframes pfloat{
            0%  {transform:translateY(0) translateX(0);}
            50% {transform:translateY(-55vh) translateX(20px);}
            100%{transform:translateY(-110vh) translateX(-14px);}
        }

        /* ── NAV ── */
        #navbar{
            position:fixed;top:0;width:100%;z-index:100;
            padding:22px 0;
            transition:padding .35s,background .35s,backdrop-filter .35s,border-color .35s,box-shadow .35s;
        }
        #navbar.scrolled{
            padding:12px 0;
            background:rgba(2,12,30,.88);
            backdrop-filter:blur(18px);
            -webkit-backdrop-filter:blur(18px);
            border-bottom:1px solid var(--c-border);
            box-shadow:0 4px 30px rgba(0,0,0,.3);
        }
        .nav-inner{max-width:1280px;margin:0 auto;padding:0 32px;display:flex;align-items:center;justify-content:space-between;}
        .logo{font-family:'Poppins',sans-serif;font-size:1.5rem;font-weight:800;color:#fff;text-decoration:none;letter-spacing:-.5px;}
        .logo span{color:var(--c-accent);}
        .nav-links{display:flex;align-items:center;gap:36px;list-style:none;}
        .nav-links a{
            font-size:.875rem;font-weight:600;color:var(--c-muted);text-decoration:none;
            position:relative;transition:color .25s;
        }
        .nav-links a::after{
            content:'';position:absolute;left:0;bottom:-4px;width:100%;height:2px;
            background:linear-gradient(90deg,var(--c-primary),var(--c-accent));
            transform:scaleX(0);transform-origin:left;transition:transform .28s ease;
        }
        .nav-links a:hover{color:#fff;}
        .nav-links a:hover::after{transform:scaleX(1);}
        .nav-admin{
            padding:8px 20px;border-radius:50px;border:1px solid rgba(56,189,248,.35);
            color:var(--c-accent);font-size:.8rem;font-weight:600;text-decoration:none;
            transition:background .25s,color .25s;
        }
        .nav-admin:hover{background:var(--c-accent);color:#020c1e;}
        .hamburger{display:none;cursor:pointer;background:none;border:none;color:var(--c-text);font-size:1.4rem;}
        .mobile-menu{
            display:none;position:fixed;inset:0;z-index:99;
            background:rgba(2,12,30,.97);backdrop-filter:blur(20px);
            flex-direction:column;align-items:center;justify-content:center;gap:36px;
        }
        .mobile-menu.open{display:flex;}
        .mobile-menu a{font-size:1.5rem;font-weight:700;color:var(--c-text);text-decoration:none;transition:color .2s;}
        .mobile-menu a:hover{color:var(--c-accent);}

        /* ── GLASS ── */
        .glass{
            background:linear-gradient(145deg,rgba(37,99,235,.1),rgba(2,12,30,.75));
            border:1px solid var(--c-border);
            backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);
            box-shadow:0 8px 32px rgba(0,0,0,.3);
        }

        /* ── GRADIENT TEXT ── */
        .grad{
            background:linear-gradient(90deg,#fff 10%,#93c5fd 50%,var(--c-accent) 100%);
            -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
        }

        /* ── SECTION LABEL ── */
        .section-label{font-size:.7rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--c-accent);}
        .section-title{font-size:clamp(2rem,5vw,3.2rem);font-weight:900;margin-top:.5rem;line-height:1.15;}

        /* ── REVEAL ── */
        .reveal{opacity:0;transform:translateY(30px);transition:opacity .75s ease,transform .75s ease;}
        .reveal.visible{opacity:1;transform:none;}
        .reveal-left{opacity:0;transform:translateX(-30px);transition:opacity .75s ease,transform .75s ease;}
        .reveal-left.visible{opacity:1;transform:none;}
        .reveal-right{opacity:0;transform:translateX(30px);transition:opacity .75s ease,transform .75s ease;}
        .reveal-right.visible{opacity:1;transform:none;}

        /* ── BUTTONS ── */
        .btn-primary{
            display:inline-flex;align-items:center;gap:8px;
            padding:14px 32px;border-radius:14px;
            background:linear-gradient(120deg,var(--c-primary),var(--c-mid));
            border:1px solid rgba(56,189,248,.3);
            color:#fff;font-weight:700;font-size:.95rem;text-decoration:none;
            box-shadow:0 8px 24px rgba(37,99,235,.3);
            position:relative;overflow:hidden;transition:transform .25s,box-shadow .25s;
        }
        .btn-primary::before{
            content:'';position:absolute;inset:0;
            background:linear-gradient(110deg,transparent 20%,rgba(255,255,255,.22) 50%,transparent 80%);
            transform:translateX(-130%);transition:transform .55s ease;
        }
        .btn-primary:hover{transform:translateY(-3px);box-shadow:0 16px 32px rgba(56,189,248,.25);}
        .btn-primary:hover::before{transform:translateX(130%);}
        .btn-outline{
            display:inline-flex;align-items:center;gap:8px;
            padding:14px 32px;border-radius:14px;
            border:1px solid rgba(56,189,248,.35);
            color:var(--c-accent);font-weight:700;font-size:.95rem;text-decoration:none;
            transition:background .25s,color .25s,transform .25s;
        }
        .btn-outline:hover{background:rgba(56,189,248,.12);transform:translateY(-3px);}

        /* ── HERO ── */
        #hero{
            position:relative;z-index:2;
            min-height:100vh;display:flex;align-items:center;
            padding:120px 32px 80px;
        }
        .hero-inner{max-width:1280px;margin:0 auto;width:100%;display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;}

        .hero-name{font-size:clamp(2.8rem,7.5vw,4.6rem);font-weight:900;line-height:1.05;margin-bottom:16px;}
        .hero-intro{font-size:.38em;display:block;font-weight:600;color:var(--c-muted);letter-spacing:1px;margin-bottom:5px;}
        .hero-role{font-size:clamp(1.3rem,3vw,1.9rem);font-weight:500;color:#ffffff;margin-bottom:24px;min-height:2.4rem;}
        .hero-bio{color:var(--c-muted);font-size:1.05rem;line-height:1.8;max-width:520px;margin-bottom:36px;}
        .hero-cta{display:flex;flex-wrap:wrap;gap:16px;margin-bottom:40px;}
        .hero-socials{display:flex;gap:14px;}
        .social-btn{
            width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;
            font-size:1rem;color:var(--c-muted);text-decoration:none;
            border:1px solid var(--c-border);backdrop-filter:blur(8px);
            transition:color .25s,border-color .25s,background .25s,transform .25s;
        }
        .social-btn:hover{color:#fff;border-color:var(--c-accent);background:rgba(56,189,248,.12);transform:translateY(-3px);}

        /* Hero photo */
        .hero-photo-wrap{display:flex;justify-content:center;align-items:center;position:relative;}
        .hero-photo-outer{position:relative;animation:float 6s ease-in-out infinite;}
        @keyframes float{0%,100%{transform:translateY(0);}50%{transform:translateY(-18px);}}

        .hero-photo-ring{position:relative;width:460px;height:460px;}

        /* Outer HUD Ring - Dashed & Spinning */
        .ring-glow{
            position:absolute;inset:-12px;border-radius:28%;
            border:2px dashed var(--c-accent);
            opacity:.6;
            animation:spin 12s linear infinite;
            z-index:0;
        }

        /* Inner HUD Ring - Solid Gradient */
        .ring-glow2{
            position:absolute;inset:-4px;border-radius:28%;
            background:linear-gradient(var(--angle,0deg),var(--c-accent),var(--c-mid),var(--c-primary),var(--c-accent));
            animation:border-spin 4s linear infinite;
            z-index:0;
            opacity:.8;
        }
        @property --angle{syntax:'<angle>';initial-value:0deg;inherits:false;}
        @keyframes border-spin{to{--angle:360deg;}}
        @keyframes spin{to{transform:rotate(360deg);}}

        .ring-inner{
            position:absolute;inset:4px;border-radius:26%;
            background:var(--c-bg);z-index:1;
        }

        .hero-photo-ring img{
            position:absolute;inset:10px;
            width:calc(100% - 20px);height:calc(100% - 20px);
            object-fit:cover;object-position:top center;
            border-radius:24%;z-index:2;
            transition:transform .5s ease, filter .5s ease;
        }
        .hero-photo-ring:hover img{transform:scale(1.04);filter:brightness(1.1) contrast(1.05);}

        /* Digital Grid Overlay on Image */
        .grid-overlay{
            position:absolute;inset:10px;border-radius:24%;z-index:3;
            background-image:linear-gradient(rgba(56,189,248,0.05) 1px, transparent 1px),
                             linear-gradient(90deg, rgba(56,189,248,0.05) 1px, transparent 1px);
            background-size:20px 20px;
            pointer-events:none;
            opacity:.5;
        }

        /* Pulsing core glow behind */
        .hero-blob{
            position:absolute;inset:-80px;border-radius:32%;
            background:radial-gradient(circle, rgba(37,99,235,.4) 0%, rgba(56,189,248,.1) 50%, transparent 70%);
            filter:blur(60px);z-index:-1;
            animation:pulse-core 4s ease-in-out infinite;
        }
        @keyframes pulse-core{0%,100%{transform:scale(1);opacity:.7;}50%{transform:scale(1.15);opacity:1;}}

        .hero-photo-outer{position:relative;animation:float-hero 6s ease-in-out infinite;}
        @keyframes float-hero{0%,100%{transform:translateY(0) rotate(0deg);}50%{transform:translateY(-20px) rotate(1deg);}}
        .hero-stats{
            position:absolute;bottom:-24px;left:50%;transform:translateX(-50%);
            display:flex;gap:16px;z-index:3;
        }
        .stat-card{
            padding:12px 20px;border-radius:14px;text-align:center;white-space:nowrap;
        }
        .stat-card .num{font-family:'Poppins',sans-serif;font-size:1.4rem;font-weight:800;color:#fff;}
        .stat-card .lbl{font-size:.65rem;color:var(--c-muted);font-weight:600;letter-spacing:.1em;text-transform:uppercase;}

        /* ── ABOUT ── */
        #about{position:relative;z-index:2;padding:120px 32px;}
        .about-inner{max-width:1280px;margin:0 auto;}
        .about-grid{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center;margin-top:64px;}
        .about-img{border-radius:24px;overflow:hidden;}
        .about-img img{width:100%;height:100%;object-fit:cover;aspect-ratio:4/3;display:block;
            transition:transform .6s ease;}
        .about-img:hover img{transform:scale(1.04);}
        .about-content{padding:8px;}
        .about-content h3{font-size:1.9rem;font-weight:800;margin-bottom:16px;}
        .about-content p{color:var(--c-muted);line-height:1.85;margin-bottom:28px;}
        .traits{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
        .trait{
            padding:14px 18px;border-radius:14px;
            font-size:.85rem;font-weight:600;
            border:1px solid rgba(56,189,248,.15);
            background:rgba(37,99,235,.08);
            display:flex;align-items:center;gap:10px;
            transition:border-color .25s,background .25s,transform .25s;
        }
        .trait:hover{border-color:rgba(56,189,248,.4);background:rgba(37,99,235,.15);transform:translateY(-2px);}
        .trait i{color:var(--c-accent);}

        /* ── SKILLS ── */
        #skills{position:relative;z-index:2;padding:120px 32px;
            background:linear-gradient(180deg,transparent,rgba(37,99,235,.04),transparent);}
        .skills-inner{max-width:1280px;margin:0 auto;}
        .skills-grid{display:grid;grid-template-columns:1fr 1fr;gap:32px;margin-top:64px;}
        .skill-card{padding:36px;border-radius:24px;}
        .skill-card-title{font-size:1.25rem;font-weight:700;margin-bottom:28px;display:flex;align-items:center;gap:10px;}
        .skill-card-title i{color:var(--c-accent);}
        .skill-item{margin-bottom:22px;}
        .skill-meta{display:flex;justify-content:space-between;font-size:.85rem;font-weight:600;margin-bottom:8px;}
        .skill-pct{color:var(--c-accent);}
        .skill-track{height:10px;border-radius:99px;background:rgba(255,255,255,.06);overflow:hidden;border:1px solid rgba(255,255,255,.05);}
        .skill-bar{
            height:100%;border-radius:99px;width:0;
            background:linear-gradient(90deg,var(--c-primary),var(--c-mid),var(--c-accent));
            transition:width 1.4s cubic-bezier(.2,.7,.2,1);
            position:relative;overflow:hidden;
        }
        .skill-bar::after{
            content:'';position:absolute;inset:0;
            background:linear-gradient(90deg,transparent,rgba(255,255,255,.35),transparent);
            animation:shimmer 2.5s linear infinite;
        }
        @keyframes shimmer{from{transform:translateX(-100%);}to{transform:translateX(200%);}}

        /* Tech icons row */
        .tech-icons{display:flex;flex-wrap:wrap;gap:14px;margin-top:48px;}
        .tech-icon{
            padding:10px 18px;border-radius:10px;font-size:.8rem;font-weight:600;
            border:1px solid var(--c-border);background:rgba(37,99,235,.08);
            display:inline-flex;align-items:center;gap:8px;color:var(--c-text);
            transition:border-color .25s,background .25s,transform .25s;
        }
        .tech-icon:hover{border-color:var(--c-accent);background:rgba(56,189,248,.12);transform:translateY(-3px);}
        .tech-icon i{color:var(--c-accent);}

        /* ── PROJECTS ── */
        #projects{position:relative;z-index:2;padding:120px 32px;}
        .projects-inner{max-width:1280px;margin:0 auto;}
        .projects-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:28px;margin-top:64px;}
        .project-card{
            border-radius:22px;overflow:hidden;
            transition:transform .4s ease,box-shadow .4s ease,border-color .4s ease;
        }
        .project-card:hover{transform:translateY(-10px);border-color:rgba(56,189,248,.45);box-shadow:0 24px 48px rgba(14,116,234,.2);}
        .project-img{position:relative;aspect-ratio:16/10;overflow:hidden;}
        .project-img img{width:100%;height:100%;object-fit:cover;transition:transform .6s ease;}
        .project-card:hover .project-img img{transform:scale(1.06);}
        .project-overlay{
            position:absolute;inset:0;
            background:linear-gradient(180deg,transparent 30%,rgba(2,12,30,.95));
            display:flex;flex-direction:column;justify-content:flex-end;padding:20px;
            opacity:0;transition:opacity .35s ease;
        }
        .project-card:hover .project-overlay{opacity:1;}
        .project-overlay-links{display:flex;gap:10px;}
        .proj-link{
            width:40px;height:40px;border-radius:50%;border:1px solid rgba(255,255,255,.3);
            display:flex;align-items:center;justify-content:center;
            color:#fff;text-decoration:none;font-size:.9rem;
            transition:background .25s,border-color .25s;
        }
        .proj-link:hover{background:var(--c-accent);border-color:var(--c-accent);color:#020c1e;}
        .project-tag{
            position:absolute;top:14px;right:14px;
            padding:5px 12px;border-radius:50px;font-size:.68rem;font-weight:700;
            background:rgba(10,102,194,.85);color:#fff;backdrop-filter:blur(8px);
        }
        .project-body{padding:24px;}
        .project-body h3{font-size:1.1rem;font-weight:700;margin-bottom:8px;}
        .project-body p{font-size:.85rem;color:var(--c-muted);line-height:1.7;}

        /* ── TIMELINE (Experience + Education) ── */
        #experience{position:relative;z-index:2;padding:120px 32px;
            background:linear-gradient(180deg,transparent,rgba(37,99,235,.04),transparent);}
        .timeline-inner{max-width:1280px;margin:0 auto;}
        .timeline-cols, .timeline-single{display:grid;gap:64px;margin-top:64px;}
        .timeline-cols{grid-template-columns:1fr 1fr;}
        .timeline-single{grid-template-columns:1fr;max-width:800px;margin-left:auto;margin-right:auto;}
        .timeline-single h3{font-size:1.4rem;text-align:center;justify-content:center;margin-bottom:40px;}
        .timeline-col h3 i{color:var(--c-accent);}
        .timeline{position:relative;padding-left:28px;}
        .timeline::before{
            content:'';position:absolute;left:0;top:8px;bottom:0;
            width:2px;background:linear-gradient(180deg,var(--c-accent),var(--c-primary),transparent);
            border-radius:2px;
        }
        .tl-item{position:relative;margin-bottom:36px;}
        .tl-dot{
            position:absolute;left:-34px;top:4px;
            width:14px;height:14px;border-radius:50%;
            background:var(--c-accent);border:3px solid var(--c-bg);
            box-shadow:0 0 12px rgba(56,189,248,.5);
            transition:transform .25s,box-shadow .25s;
        }
        .tl-item:hover .tl-dot{transform:scale(1.3);box-shadow:0 0 20px rgba(56,189,248,.8);}
        .tl-card{
            padding:20px 22px;border-radius:16px;
            transition:border-color .3s,transform .3s,box-shadow .3s;
        }
        .tl-item:hover .tl-card{border-color:rgba(56,189,248,.4);transform:translateX(4px);box-shadow:0 8px 24px rgba(14,116,234,.15);}
        .tl-date{font-size:.72rem;font-weight:700;color:var(--c-accent);letter-spacing:.12em;text-transform:uppercase;margin-bottom:6px;}
        .tl-title{font-size:1rem;font-weight:700;margin-bottom:4px;}
        .tl-sub{font-size:.85rem;color:var(--c-muted);margin-bottom:8px;}
        .tl-desc{font-size:.83rem;color:var(--c-muted);line-height:1.7;}

        /* ── CERTIFICATES ── */
        #certificates{position:relative;z-index:2;padding:120px 32px;}
        .certs-inner{max-width:1280px;margin:0 auto;}
        .certs-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-top:64px;}
        .cert-card{
            padding:28px;border-radius:20px;display:flex;gap:18px;align-items:flex-start;
            transition:transform .35s,box-shadow .35s,border-color .35s;
        }
        .cert-card:hover{transform:translateY(-6px);border-color:rgba(56,189,248,.4);box-shadow:0 16px 36px rgba(14,116,234,.18);}
        .cert-icon{
            width:48px;height:48px;border-radius:12px;flex-shrink:0;
            background:linear-gradient(135deg,var(--c-primary),var(--c-accent));
            display:flex;align-items:center;justify-content:center;font-size:1.2rem;color:#fff;
        }
        .cert-info h4{font-size:.95rem;font-weight:700;margin-bottom:4px;}
        .cert-info p{font-size:.8rem;color:var(--c-muted);}
        .cert-info span{font-size:.72rem;color:var(--c-accent);font-weight:600;}

        /* ── CONTACT ── */
        #contact{position:relative;z-index:2;padding:120px 32px;}
        .contact-inner{max-width:1100px;margin:0 auto;}
        .contact-card{
            border-radius:32px;padding:56px 64px;
            display:grid;grid-template-columns:2fr 3fr;gap:64px;margin-top:64px;
        }
        .contact-info h3{font-size:2rem;font-weight:800;margin-bottom:16px;}
        .contact-info p{color:var(--c-muted);line-height:1.8;margin-bottom:32px;}
        .contact-detail{display:flex;align-items:center;gap:14px;margin-bottom:20px;color:var(--c-text);font-size:.9rem;}
        .contact-detail i{
            width:40px;height:40px;border-radius:10px;flex-shrink:0;
            background:rgba(37,99,235,.15);border:1px solid var(--c-border);
            display:flex;align-items:center;justify-content:center;color:var(--c-accent);font-size:.9rem;
        }
        .contact-form .field{margin-bottom:20px;}
        .contact-form input,.contact-form textarea{
            width:100%;padding:14px 18px;border-radius:14px;
            background:rgba(4,15,40,.7);
            border:1px solid rgba(56,189,248,.2);
            color:var(--c-text);font-size:.95rem;font-family:inherit;
            transition:border-color .25s,box-shadow .25s,transform .2s;outline:none;
        }
        .contact-form input:focus,.contact-form textarea:focus{
            border-color:rgba(56,189,248,.8);
            box-shadow:0 0 0 4px rgba(56,189,248,.12),0 8px 24px rgba(8,47,109,.2);
            transform:translateY(-1px);
        }
        .contact-form input::placeholder,.contact-form textarea::placeholder{color:rgba(127,164,204,.5);}
        .contact-form .row{display:grid;grid-template-columns:1fr 1fr;gap:16px;}
        .form-success{
            padding:16px 20px;border-radius:14px;margin-bottom:20px;
            background:rgba(34,197,94,.08);border:1px solid rgba(34,197,94,.3);color:#86efac;font-size:.9rem;
        }

        /* ── FOOTER ── */
        footer{
            position:relative;z-index:2;
            padding:48px 32px;border-top:1px solid rgba(255,255,255,.05);
            text-align:center;color:var(--c-muted);font-size:.85rem;
        }
        footer a{color:var(--c-accent);text-decoration:none;}

        /* ── SCROLL TOP ── */
        #scrollTop{
            position:fixed;bottom:32px;right:32px;z-index:200;
            width:48px;height:48px;border-radius:50%;
            background:linear-gradient(135deg,var(--c-primary),var(--c-accent));
            color:#fff;border:none;cursor:pointer;font-size:1.1rem;
            display:flex;align-items:center;justify-content:center;
            opacity:0;pointer-events:none;
            transition:opacity .3s,transform .3s;
            box-shadow:0 8px 24px rgba(37,99,235,.4);
        }
        #scrollTop.show{opacity:1;pointer-events:auto;}
        #scrollTop:hover{transform:translateY(-4px);}

        /* ── RESPONSIVE ── */
        @media(max-width:1024px){
            .projects-grid{grid-template-columns:1fr 1fr;}
            .certs-grid{grid-template-columns:1fr 1fr;}
        }
        @media(max-width:768px){
            .hero-inner{grid-template-columns:1fr;gap:48px;text-align:center;}
            .hero-cta,.hero-socials{justify-content:center;}
            .about-grid{grid-template-columns:1fr;}
            .skills-grid{grid-template-columns:1fr;}
            .projects-grid{grid-template-columns:1fr;}
            .timeline-cols{grid-template-columns:1fr;}
            .certs-grid{grid-template-columns:1fr;}
            .contact-card{grid-template-columns:1fr;padding:36px 28px;gap:36px;}
            .contact-form .row{grid-template-columns:1fr;}
            .nav-links{display:none;}
            .hamburger{display:block;}
            .hero-photo-ring{width:300px;height:300px;}
            .hero-stats{flex-direction:column;left:auto;right:0;bottom:auto;top:0;transform:none;}
            .traits{grid-template-columns:1fr;}
            .stat-card{padding:8px 14px;}
        }
        @media(prefers-reduced-motion:reduce){
            *{animation:none!important;transition:none!important;}
            .reveal,.reveal-left,.reveal-right{opacity:1;transform:none;}
        }
    </style>
</head>
<body>
    <div id="particles" aria-hidden="true"></div>

    {{-- ── NAV ── --}}
    <nav id="navbar" role="navigation" aria-label="Main navigation">
        <div class="nav-inner">
            <a href="#hero" class="logo"><span>FEHAS</span></a>
            <ul class="nav-links" role="list">
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#experience">Education</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>

            </ul>
            <button class="hamburger" id="hamburgerBtn" aria-label="Toggle menu" aria-expanded="false">
                <i class="fa-solid fa-bars" id="hamburgerIcon"></i>
            </button>
        </div>
    </nav>

    {{-- Mobile Menu --}}
    <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
        <a href="#hero" class="mobile-link">Home</a>
        <a href="#about" class="mobile-link">About</a>
        <a href="#skills" class="mobile-link">Skills</a>
        <a href="#experience" class="mobile-link">Education</a>
        <a href="#projects" class="mobile-link">Projects</a>
        <a href="#contact" class="mobile-link">Contact</a>
    </div>

    {{-- ── HERO ── --}}
    <section id="hero" aria-labelledby="hero-heading">
        <div class="hero-inner">
            <div class="reveal">

                <h1 class="hero-name" id="hero-heading">
                    <span class="hero-intro">Hi, I'm</span>
                    <span class="grad">{{ $profile->name ?? 'John Doe' }}</span>
                </h1>
                <div class="hero-role">
                    Software Developer & Graphic Designer
                </div>
                <p class="hero-bio">{{ $profile->bio ?? 'I craft modern, high-performance web experiences with clean architecture, beautiful interfaces, and scalable backend systems.' }}</p>
                <div class="hero-cta">
                    <a href="#projects" class="btn-primary" id="hero-view-projects-btn">
                        <i class="fa-solid fa-rocket"></i> View Projects
                    </a>
                    <a href="{{ ($profile && $profile->cv_path) ? asset($profile->cv_path) : '#' }}" 
                       class="btn-outline" 
                       id="hero-download-cv-btn"
                       target="_blank"
                       download>
                        <i class="fa-solid fa-download"></i> Download CV
                    </a>
                </div>
                <div class="hero-socials">
                    @if(data_get($profile, 'social_links.github'))
                    <a href="{{ $profile->social_links['github'] }}" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="GitHub" id="hero-github-link">
                        <i class="fa-brands fa-github"></i>
                    </a>
                    @endif

                    @if(data_get($profile, 'social_links.linkedin'))
                    <a href="{{ $profile->social_links['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="LinkedIn" id="hero-linkedin-link">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    @endif

                    @if(data_get($profile, 'social_links.twitter'))
                    <a href="{{ $profile->social_links['twitter'] }}" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="Twitter" id="hero-twitter-link">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                    @endif

                    @if(data_get($profile, 'social_links.email'))
                    <a href="mailto:{{ $profile->social_links['email'] }}" class="social-btn" aria-label="Email" id="hero-email-link">
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                    @endif
                </div>
            </div>

            <div class="hero-photo-wrap">
                <div class="hero-photo-outer">
                    <div class="hero-blob"></div>
                    <div class="hero-photo-ring">
                        <div class="ring-glow"></div>
                        <div class="ring-glow2"></div>
                        <div class="ring-inner"></div>
                        <div class="grid-overlay"></div>
                        <img src="{{ ($profile && $profile->image) ? asset($profile->image) : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=600' }}"
                             alt="{{ $profile->name ?? 'Developer' }} profile photo">
                    </div>
                    <div class="hero-stats">
                        <div class="stat-card glass">
                            <div class="num">22+</div>
                            <div class="lbl">Projects</div>
                        </div>
                        <div class="stat-card glass">
                            <div class="num">3+</div>
                            <div class="lbl">Experience</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── ABOUT ── --}}
    <section id="about" aria-labelledby="about-heading">
        <div class="about-inner">
            <div class="text-center reveal">
                <p class="section-label">About Me</p>
                <h2 class="section-title" id="about-heading">Professional <span class="grad">Journey</span></h2>
            </div>
            <div class="about-grid">
                <div class="about-img glass card-lift reveal-left">
                    <img src="{{ ($profile && $profile->about_image) ? asset($profile->about_image) : (($profile && $profile->image) ? asset($profile->image) : 'https://images.unsplash.com/photo-1542831371-159c77c040fe?auto=format&fit=crop&q=80&w=800') }}"
                         alt="About {{ $profile->name ?? 'Developer' }}">
                </div>
                <div class="about-content reveal-right">
                    <h3>Building impactful <span class="grad">digital products</span></h3>
                    <p>{{ $profile->bio ?? 'Passionate about solving real business problems through scalable backend systems and polished frontend experiences. I focus on writing clean, maintainable code that makes a difference.' }}</p>
                    <div class="traits">
                        <div class="trait"><i class="fa-solid fa-layer-group"></i>Clean Architecture</div>
                        <div class="trait"><i class="fa-solid fa-palette"></i>Modern UI/UX</div>
                        <div class="trait"><i class="fa-solid fa-bolt"></i>Fast Performance</div>
                        <div class="trait"><i class="fa-solid fa-mobile-screen"></i>Responsive Design</div>
                        <div class="trait"><i class="fa-solid fa-shield-halved"></i>Secure Systems</div>
                        <div class="trait"><i class="fa-solid fa-arrows-rotate"></i>Agile Workflow</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── SKILLS ── --}}
    <section id="skills" aria-labelledby="skills-heading">
        <div class="skills-inner">
            <div class="text-center reveal">
                <p class="section-label">Skills</p>
                <h2 class="section-title" id="skills-heading">Technical <span class="grad">Expertise</span></h2>
            </div>
            <div class="skills-grid">
                <div class="glass skill-card reveal">
                    <div class="skill-card-title"><i class="fa-solid fa-code"></i> Development</div>
                    <div>
                        @forelse ($skills->where('category','development') as $skill)
                        <div class="skill-item">
                            <div class="skill-meta">
                                <span>{{ $skill->name }}</span>
                                <span class="skill-pct">{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="{{ $skill->proficiency }}%"></div>
                            </div>
                        </div>
                        @empty
                        <div class="skill-item">
                            <div class="skill-meta"><span>PHP / Laravel</span><span class="skill-pct">90%</span></div>
                            <div class="skill-track"><div class="skill-bar" data-width="90%"></div></div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-meta"><span>JavaScript / Vue</span><span class="skill-pct">85%</span></div>
                            <div class="skill-track"><div class="skill-bar" data-width="85%"></div></div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-meta"><span>MySQL / PostgreSQL</span><span class="skill-pct">80%</span></div>
                            <div class="skill-track"><div class="skill-bar" data-width="80%"></div></div>
                        </div>
                        @endforelse
                    </div>
                </div>
                <div class="glass skill-card reveal">
                    <div class="skill-card-title"><i class="fa-solid fa-wand-magic-sparkles"></i> Design & Other</div>
                    <div>
                        @forelse ($skills->where('category','!=','development') as $skill)
                        <div class="skill-item">
                            <div class="skill-meta">
                                <span>{{ $skill->name }}</span>
                                <span class="skill-pct">{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="{{ $skill->proficiency }}%"></div>
                            </div>
                        </div>
                        @empty
                        <div class="skill-item">
                            <div class="skill-meta"><span>Tailwind CSS</span><span class="skill-pct">88%</span></div>
                            <div class="skill-track"><div class="skill-bar" data-width="88%"></div></div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-meta"><span>Figma / UI Design</span><span class="skill-pct">75%</span></div>
                            <div class="skill-track"><div class="skill-bar" data-width="75%"></div></div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-meta"><span>Docker / DevOps</span><span class="skill-pct">70%</span></div>
                            <div class="skill-track"><div class="skill-bar" data-width="70%"></div></div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- Tech tags --}}
            <div class="tech-icons reveal" style="margin-top:40px;justify-content:center;">
                <span class="tech-icon"><i class="fa-brands fa-php"></i> PHP</span>
                <span class="tech-icon"><i class="fa-brands fa-laravel"></i> Laravel</span>
                <span class="tech-icon"><i class="fa-brands fa-js"></i> JavaScript</span>
                <span class="tech-icon"><i class="fa-brands fa-vuejs"></i> Vue.js</span>
                <span class="tech-icon"><i class="fa-brands fa-react"></i> React</span>
                <span class="tech-icon"><i class="fa-brands fa-node-js"></i> Node.js</span>
                <span class="tech-icon"><i class="fa-brands fa-docker"></i> Docker</span>
                <span class="tech-icon"><i class="fa-brands fa-git-alt"></i> Git</span>
                <span class="tech-icon"><i class="fa-solid fa-database"></i> MySQL</span>
                <span class="tech-icon"><i class="fa-brands fa-aws"></i> AWS</span>
            </div>
        </div>
    </section>

    {{-- ── PROJECTS ── --}}
    <section id="projects" aria-labelledby="projects-heading">
        <div class="projects-inner">
            <div class="text-center reveal">
                <p class="section-label">Work</p>
                <h2 class="section-title" id="projects-heading">Featured <span class="grad">Projects</span></h2>
            </div>
            <div class="projects-grid">
                @forelse ($projects as $project)
                <article class="project-card glass reveal" id="project-card-{{ $project->id }}">
                    <div class="project-img">
                        <img src="{{ $project->image ? asset($project->image) : 'https://picsum.photos/seed/'.$project->id.'/800/500' }}"
                             alt="{{ $project->title }}" loading="lazy">
                        <div class="project-tag">{{ $project->category ?? 'Web' }}</div>
                        <div class="project-overlay">
                            <div class="project-overlay-links">
                                @if($project->link)
                                <a href="{{ $project->link }}" target="_blank" rel="noopener" class="proj-link" aria-label="Live demo"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                @endif
                                @if($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank" rel="noopener" class="proj-link" aria-label="GitHub repo"><i class="fa-brands fa-github"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="project-body">
                        <h3>{{ $project->title }}</h3>
                        <p>{{ Str::limit($project->description, 100) }}</p>
                    </div>
                </article>
                @empty
                <div class="col-span-3 glass reveal" style="border-radius:24px;padding:64px;text-align:center;">
                    <i class="fa-regular fa-folder-open" style="font-size:3rem;color:var(--c-muted);margin-bottom:16px;display:block;"></i>
                    <p style="color:var(--c-muted);">No projects yet. Add projects from the admin panel.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ── EXPERIENCE & EDUCATION ── --}}
    <section id="experience" aria-labelledby="experience-heading">
        <div class="timeline-inner">
            <div class="text-center reveal">
                <p class="section-label">Journey</p>
                <h2 class="section-title" id="experience-heading">Edu<span class="grad">cation</span></h2>
            </div>
            <div class="timeline-single">
                    <h3><i class="fa-solid fa-graduation-cap"></i> Education</h3>
                    <div class="timeline">
                        @forelse ($education as $edu)
                        <div class="tl-item">
                            <div class="tl-dot"></div>
                            <div class="tl-card glass">
                                <div class="tl-date">{{ $edu->duration }}</div>
                                <div class="tl-title">{{ $edu->degree }}</div>
                                <div class="tl-sub">{{ $edu->institution }}</div>
                            </div>
                        </div>
                        @empty
                        <div class="tl-item">
                            <div class="tl-dot"></div>
                            <div class="tl-card glass">
                                <div class="tl-date">2020 – 2024</div>
                                <div class="tl-title">Bachelor of Computer Science</div>
                                <div class="tl-sub">University</div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── CERTIFICATES ── --}}
    @if($certificates->count())
    <section id="certificates" aria-labelledby="certs-heading">
        <div class="certs-inner">
            <div class="text-center reveal">
                <p class="section-label">Credentials</p>
                <h2 class="section-title" id="certs-heading">Certifi<span class="grad">cations</span></h2>
            </div>
            <div class="certs-grid">
                @foreach ($certificates as $cert)
                <div class="cert-card glass reveal" id="cert-card-{{ $cert->id }}">
                    <div class="cert-icon"><i class="fa-solid fa-certificate"></i></div>
                    <div class="cert-info">
                        <h4>{{ $cert->name }}</h4>
                        <p>{{ $cert->issuer }}</p>
                        <span>{{ $cert->date }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ── CONTACT ── --}}
    <section id="contact" aria-labelledby="contact-heading">
        <div class="contact-inner">
            <div class="text-center reveal">
                <p class="section-label">Contact</p>
                <h2 class="section-title" id="contact-heading">Let's Build <span class="grad">Something Great</span></h2>
            </div>
            <div class="contact-card glass reveal">
                <div class="contact-info">
                    <h3>Get in <span class="grad">Touch</span></h3>
                    <p>Available for freelance projects, collaborations, and full-time opportunities. Let's create something amazing together.</p>
                    <div class="contact-detail">
                        <i class="fa-regular fa-envelope"></i>
                        <span>smfehas@gmail.com</span>
                    </div>
                    <div class="contact-detail">
                        <i class="fa-solid fa-phone"></i>
                        <span>0767536632</span>
                    </div>
                    <div class="contact-detail">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Sammanthurai, Ampara District, Sri Lanka</span>
                    </div>
                </div>
                <div class="contact-form">
                    <a href="mailto:smfehas@gmail.com?subject=Portfolio%20Inquiry" class="btn-primary" style="width:100%;justify-content:center;display:inline-flex;" id="contact-email-btn">
                        <i class="fa-solid fa-paper-plane"></i> Send me an Email
                    </a>
                    <p style="margin-top:16px;font-size:.85rem;color:var(--c-muted);text-align:center;">Or reach out directly at <a href="mailto:smfehas@gmail.com" style="color:var(--c-accent);">smfehas@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>

    {{-- ── FOOTER ── --}}
    <footer>
        <p>&copy; {{ date('Y') }} Developed by Fehas</p>
    </footer>

    {{-- Scroll to top --}}
    <button id="scrollTop" aria-label="Scroll to top"><i class="fa-solid fa-arrow-up"></i></button>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // ── Particles ──
        if (!prefersReduced) {
            const layer = document.getElementById('particles');
            const count = window.innerWidth < 768 ? 6 : 14;
            const frag = document.createDocumentFragment();
            for (let i = 0; i < count; i++) {
                const p = document.createElement('span');
                p.className = 'particle';
                const s = 2 + Math.random() * 3;
                p.style.cssText = `width:${s}px;height:${s}px;left:${Math.random()*100}%;`;
                p.style.setProperty('--dur', `${16 + Math.random() * 14}s`);
                p.style.setProperty('--delay', `${Math.random() * 10}s`);
                p.style.setProperty('--op', `${.1 + Math.random() * .3}`);
                frag.appendChild(p);
            }
            layer.appendChild(frag);
        }

        // ── Navbar scroll ──
        const navbar = document.getElementById('navbar');
        const scrollTopBtn = document.getElementById('scrollTop');
        const onScroll = () => {
            const y = window.scrollY;
            navbar.classList.toggle('scrolled', y > 40);
            scrollTopBtn.classList.toggle('show', y > 400);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        // ── Scroll top ──
        scrollTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        // ── Mobile menu ──
        const hamburger = document.getElementById('hamburgerBtn');
        const icon = document.getElementById('hamburgerIcon');
        const menu = document.getElementById('mobileMenu');
        let menuOpen = false;
        const toggleMenu = (open) => {
            menuOpen = open;
            menu.classList.toggle('open', open);
            menu.setAttribute('aria-hidden', String(!open));
            hamburger.setAttribute('aria-expanded', String(open));
            icon.className = open ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
        };
        hamburger.addEventListener('click', () => toggleMenu(!menuOpen));
        document.querySelectorAll('.mobile-link').forEach(l => l.addEventListener('click', () => toggleMenu(false)));

        // ── Scroll reveal ──
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); revealObserver.unobserve(e.target); } });
        }, { threshold: 0.12 });
        document.querySelectorAll('.reveal, .reveal-left, .reveal-right').forEach(el => revealObserver.observe(el));

        // ── Skill bars ──
        const skillObserver = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting && !e.target.dataset.animated) {
                    e.target.style.width = e.target.getAttribute('data-width') || '0%';
                    e.target.dataset.animated = '1';
                }
            });
        }, { threshold: 0.3 });
        document.querySelectorAll('.skill-bar').forEach(b => skillObserver.observe(b));

        // ── Timeline stagger ──
        document.querySelectorAll('.tl-item').forEach((item, idx) => {
            item.style.transitionDelay = `${idx * 0.1}s`;
        });
    });
    </script>
</body>
</html>
