<!DOCTYPE html>
<html lang="fr" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Zakaria Benjrada — Développeur Digital</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    /* ============================================================
       CSS CUSTOM PROPERTIES & RESET
    ============================================================ */
    :root {
      --bg:        #05050a;
      --bg-2:      #0c0c16;
      --bg-3:      #111120;
      --surface:   rgba(255,255,255,0.04);
      --surface-2: rgba(255,255,255,0.08);
      --border:    rgba(255,255,255,0.08);
      --border-2:  rgba(255,255,255,0.14);
      --text:      #f0f0f8;
      --text-2:    rgba(240,240,248,0.6);
      --text-3:    rgba(240,240,248,0.35);
      --accent:    #6c5ce7;
      --accent-2:  #a29bfe;
      --gold:      #ffd166;
      --teal:      #00cec9;
      --pink:      #fd79a8;
      --glow:      rgba(108,92,231,0.35);
      --glow-2:    rgba(0,206,201,0.2);
      --r-sm:      8px;
      --r-md:      16px;
      --r-lg:      24px;
      --r-xl:      36px;
      --ease-out:  cubic-bezier(0.16, 1, 0.3, 1);
      --ease-in:   cubic-bezier(0.4, 0, 1, 1);
      --dur:       0.7s;
    }

    [data-theme="light"] {
      --bg:        #f8f8fc;
      --bg-2:      #eeeef8;
      --bg-3:      #e4e4f0;
      --surface:   rgba(0,0,0,0.03);
      --surface-2: rgba(0,0,0,0.07);
      --border:    rgba(0,0,0,0.08);
      --border-2:  rgba(0,0,0,0.14);
      --text:      #12121e;
      --text-2:    rgba(18,18,30,0.6);
      --text-3:    rgba(18,18,30,0.35);
      --glow:      rgba(108,92,231,0.15);
      --glow-2:    rgba(0,206,201,0.12);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html {
      scroll-behavior: smooth;
      font-size: 16px;
      -webkit-font-smoothing: antialiased;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      font-weight: 300;
      line-height: 1.7;
      overflow-x: hidden;
      cursor: none;
    }

    ::selection { background: var(--accent); color: #fff; }

    img { max-width: 100%; display: block; }
    a { text-decoration: none; color: inherit; }
    button { cursor: none; font-family: inherit; border: none; background: none; }
    ul { list-style: none; }

    /* ============================================================
       CUSTOM CURSOR
    ============================================================ */
    #cursor-dot,
    #cursor-ring {
      position: fixed;
      top: 0; left: 0;
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: opacity 0.3s;
    }

    #cursor-dot {
      width: 8px;
      height: 8px;
      background: var(--accent-2);
      transition: transform 0.1s, background 0.2s;
    }

    #cursor-ring {
      width: 40px;
      height: 40px;
      border: 1.5px solid var(--accent);
      transition: transform 0.15s var(--ease-out), width 0.3s, height 0.3s, border-color 0.2s;
    }

    body:has(a:hover) #cursor-ring,
    body:has(button:hover) #cursor-ring {
      width: 60px;
      height: 60px;
      border-color: var(--accent-2);
    }

    /* ============================================================
       CANVAS PARTICLES BACKGROUND
    ============================================================ */
    #particles-canvas {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      pointer-events: none;
      z-index: 0;
      opacity: 0.4;
    }

    /* ============================================================
       NOISE TEXTURE OVERLAY
    ============================================================ */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
      pointer-events: none;
      z-index: 1;
      opacity: 0.5;
    }

    /* ============================================================
       LAYOUT HELPERS
    ============================================================ */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 32px;
    }

    .section {
      position: relative;
      z-index: 2;
      padding: 120px 0;
    }

    .section-label {
      font-family: 'Space Mono', monospace;
      font-size: 11px;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--accent-2);
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .section-label::before {
      content: '';
      display: block;
      width: 32px;
      height: 1px;
      background: var(--accent-2);
    }

    .section-title {
      font-family: 'Syne', sans-serif;
      font-size: clamp(2rem, 5vw, 3.5rem);
      font-weight: 800;
      line-height: 1.1;
      margin-bottom: 24px;
    }

    .section-title span { color: var(--accent-2); }

    .section-sub {
      color: var(--text-2);
      font-size: 1.1rem;
      max-width: 560px;
      font-weight: 300;
    }

    /* ============================================================
       SCROLL REVEAL SYSTEM
    ============================================================ */
    .reveal {
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.9s var(--ease-out), transform 0.9s var(--ease-out);
    }

    .reveal.visible {
      opacity: 1;
      transform: none;
    }

    .reveal-left { transform: translateX(-50px); }
    .reveal-right { transform: translateX(50px); }
    .reveal-left.visible,
    .reveal-right.visible { transform: none; }

    .reveal-delay-1 { transition-delay: 0.1s; }
    .reveal-delay-2 { transition-delay: 0.2s; }
    .reveal-delay-3 { transition-delay: 0.3s; }
    .reveal-delay-4 { transition-delay: 0.4s; }
    .reveal-delay-5 { transition-delay: 0.5s; }
    .reveal-delay-6 { transition-delay: 0.6s; }

    /* ============================================================
       NAVBAR
    ============================================================ */
    #navbar {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 100;
      padding: 24px 0;
      transition: padding 0.4s var(--ease-out), background 0.4s, backdrop-filter 0.4s;
    }

    #navbar.scrolled {
      padding: 14px 0;
      background: rgba(5,5,10,0.8);
      backdrop-filter: blur(20px) saturate(1.5);
      border-bottom: 1px solid var(--border);
    }

    [data-theme="light"] #navbar.scrolled {
      background: rgba(248,248,252,0.85);
    }

    .nav-inner {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .nav-logo {
      font-family: 'Syne', sans-serif;
      font-weight: 800;
      font-size: 1.4rem;
      letter-spacing: -0.02em;
      background: linear-gradient(135deg, var(--accent-2), var(--teal));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 36px;
    }

    .nav-links a {
      font-family: 'DM Sans', sans-serif;
      font-size: 0.875rem;
      font-weight: 400;
      color: var(--text-2);
      position: relative;
      transition: color 0.3s;
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: -4px; left: 0;
      width: 0; height: 1px;
      background: var(--accent-2);
      transition: width 0.3s var(--ease-out);
    }

    .nav-links a:hover { color: var(--text); }
    .nav-links a:hover::after { width: 100%; }

    .nav-actions {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .theme-btn {
      width: 40px; height: 40px;
      border-radius: 50%;
      border: 1px solid var(--border-2);
      background: var(--surface);
      color: var(--text-2);
      display: flex; align-items: center; justify-content: center;
      font-size: 0.875rem;
      transition: all 0.3s;
    }

    .theme-btn:hover {
      border-color: var(--accent);
      color: var(--accent-2);
      background: var(--glow);
    }

    .nav-cta {
      padding: 10px 24px;
      border-radius: 100px;
      background: var(--accent);
      color: #fff;
      font-size: 0.875rem;
      font-weight: 500;
      transition: all 0.3s var(--ease-out);
      position: relative;
      overflow: hidden;
    }

    .nav-cta::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, transparent, rgba(255,255,255,0.1));
      opacity: 0;
      transition: opacity 0.3s;
    }

    .nav-cta:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px var(--glow);
    }

    .nav-cta:hover::before { opacity: 1; }

    .hamburger {
      display: none;
      width: 40px; height: 40px;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }

    .hamburger span {
      display: block;
      width: 24px; height: 1.5px;
      background: var(--text);
      transition: all 0.3s;
      transform-origin: center;
    }

    .hamburger.active span:nth-child(1) { transform: translateY(7.5px) rotate(45deg); }
    .hamburger.active span:nth-child(2) { opacity: 0; }
    .hamburger.active span:nth-child(3) { transform: translateY(-7.5px) rotate(-45deg); }

    /* Mobile nav */
    .mobile-nav {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(5,5,10,0.97);
      z-index: 99;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 36px;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.4s;
    }

    .mobile-nav.open {
      opacity: 1;
      pointer-events: all;
    }

    .mobile-nav a {
      font-family: 'Syne', sans-serif;
      font-size: 2rem;
      font-weight: 700;
      color: var(--text-2);
      transition: color 0.3s;
    }

    .mobile-nav a:hover { color: var(--accent-2); }

    /* ============================================================
       HERO SECTION
    ============================================================ */
    #hero {
      min-height: 100vh;
      display: flex;
      align-items: center;
      position: relative;
      z-index: 2;
      padding: 120px 0 80px;
      overflow: hidden;
    }

    .hero-bg-blob {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      pointer-events: none;
      animation: blob-float 8s ease-in-out infinite alternate;
    }

    .hero-blob-1 {
      width: 600px; height: 600px;
      background: radial-gradient(circle, rgba(108,92,231,0.18), transparent);
      top: -100px; right: -100px;
      animation-delay: 0s;
    }

    .hero-blob-2 {
      width: 500px; height: 500px;
      background: radial-gradient(circle, rgba(0,206,201,0.12), transparent);
      bottom: -50px; left: -100px;
      animation-delay: 3s;
    }

    .hero-blob-3 {
      width: 300px; height: 300px;
      background: radial-gradient(circle, rgba(253,121,168,0.1), transparent);
      top: 40%; left: 30%;
      animation-delay: 1.5s;
    }

    @keyframes blob-float {
      0% { transform: translate(0, 0) scale(1); }
      100% { transform: translate(30px, -30px) scale(1.08); }
    }

    /* Floating grid lines */
    .grid-overlay {
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(var(--border) 1px, transparent 1px),
        linear-gradient(90deg, var(--border) 1px, transparent 1px);
      background-size: 60px 60px;
      mask-image: radial-gradient(ellipse at center, transparent 30%, black 100%);
      pointer-events: none;
      opacity: 0.5;
    }

    .hero-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: center;
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 8px 18px;
      border-radius: 100px;
      border: 1px solid var(--border-2);
      background: var(--surface);
      font-size: 0.8rem;
      color: var(--text-2);
      margin-bottom: 28px;
      backdrop-filter: blur(8px);
      animation: fade-down 1s var(--ease-out) 0.2s both;
    }

    .badge-dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: var(--teal);
      animation: pulse-dot 2s ease infinite;
    }

    @keyframes pulse-dot {
      0%, 100% { box-shadow: 0 0 0 0 rgba(0,206,201,0.5); }
      50% { box-shadow: 0 0 0 6px rgba(0,206,201,0); }
    }

    .hero-name {
      font-family: 'Syne', sans-serif;
      font-size: clamp(3rem, 7vw, 5.5rem);
      font-weight: 800;
      line-height: 1.0;
      letter-spacing: -0.03em;
      margin-bottom: 8px;
      animation: fade-up 1s var(--ease-out) 0.3s both;
    }

    .hero-name .highlight {
      background: linear-gradient(135deg, var(--accent-2) 0%, var(--teal) 60%, var(--pink) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-title-wrapper {
      margin-bottom: 28px;
      animation: fade-up 1s var(--ease-out) 0.45s both;
    }

    .hero-title {
      font-family: 'Space Mono', monospace;
      font-size: 1rem;
      color: var(--accent-2);
      letter-spacing: 0.05em;
    }

    .typed-text { border-right: 2px solid var(--accent-2); }

    .hero-slogan {
      font-size: 1.15rem;
      color: var(--text-2);
      line-height: 1.7;
      max-width: 480px;
      margin-bottom: 44px;
      animation: fade-up 1s var(--ease-out) 0.6s both;
    }

    .hero-actions {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
      animation: fade-up 1s var(--ease-out) 0.75s both;
    }

    .btn-primary {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 14px 32px;
      border-radius: 100px;
      background: linear-gradient(135deg, var(--accent), #9b59b6);
      color: #fff;
      font-weight: 500;
      font-size: 0.95rem;
      transition: all 0.35s var(--ease-out);
      position: relative;
      overflow: hidden;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.08), transparent);
      opacity: 0;
      transition: opacity 0.3s;
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 40px var(--glow);
    }

    .btn-primary:hover::before { opacity: 1; }
    .btn-primary i { transition: transform 0.3s; }
    .btn-primary:hover i { transform: translateX(4px); }

    .btn-secondary {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 14px 32px;
      border-radius: 100px;
      border: 1px solid var(--border-2);
      background: var(--surface);
      color: var(--text);
      font-weight: 400;
      font-size: 0.95rem;
      backdrop-filter: blur(8px);
      transition: all 0.35s var(--ease-out);
    }

    .btn-secondary:hover {
      border-color: var(--accent);
      color: var(--accent-2);
      transform: translateY(-3px);
      background: var(--glow);
    }

    /* Hero Visual Side */
    .hero-visual {
      display: flex;
      justify-content: center;
      align-items: center;
      animation: fade-left 1s var(--ease-out) 0.5s both;
      position: relative;
    }

    .hero-avatar-wrap {
      position: relative;
      width: 380px;
      height: 380px;
    }

    .avatar-ring-1,
    .avatar-ring-2 {
      position: absolute;
      border-radius: 50%;
      border: 1px solid var(--border-2);
      animation: ring-spin 20s linear infinite;
    }

    .avatar-ring-1 {
      inset: -30px;
      border-color: rgba(108,92,231,0.2);
    }

    .avatar-ring-2 {
      inset: -60px;
      animation-direction: reverse;
      animation-duration: 30s;
      border-color: rgba(0,206,201,0.15);
      border-style: dashed;
    }

    @keyframes ring-spin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    /* Orbit dots */
    .orbit-dot {
      position: absolute;
      width: 12px; height: 12px;
      border-radius: 50%;
      background: var(--accent);
      top: -6px; left: 50%;
      transform-origin: 0 246px;
    }

    .orbit-dot:nth-child(2) { background: var(--teal); transform-origin: 0 276px; animation-delay: -10s; }
    .orbit-dot:nth-child(3) { background: var(--pink); transform-origin: 0 306px; animation-delay: -20s; }

    .avatar-card {
      position: relative;
      width: 100%;
      height: 100%;
      border-radius: 40px;
      background: linear-gradient(135deg, var(--bg-3), var(--bg-2));
      border: 1px solid var(--border-2);
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 40px 80px rgba(0,0,0,0.4), inset 0 1px 0 rgba(255,255,255,0.06);
    }

    .avatar-initials {
      font-family: 'Syne', sans-serif;
      font-size: 6rem;
      font-weight: 800;
      background: linear-gradient(135deg, var(--accent-2), var(--teal));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      line-height: 1;
    }

    .avatar-glow {
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse at 30% 30%, rgba(108,92,231,0.2), transparent 60%);
    }

    /* Floating tech chips */
    .tech-chip {
      position: absolute;
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 10px 16px;
      border-radius: 100px;
      background: rgba(12,12,22,0.85);
      border: 1px solid var(--border-2);
      backdrop-filter: blur(10px);
      font-size: 0.8rem;
      font-weight: 500;
      white-space: nowrap;
      box-shadow: 0 8px 24px rgba(0,0,0,0.3);
      animation: chip-float 4s ease-in-out infinite alternate;
    }

    .tech-chip i { font-size: 1rem; }
    .tech-chip:nth-child(4) { top: 10%; right: -20px; color: #e34c26; animation-delay: 0s; }
    .tech-chip:nth-child(5) { bottom: 20%; left: -30px; color: #2965f1; animation-delay: 1.5s; }
    .tech-chip:nth-child(6) { bottom: 5%; right: -10px; color: #f0db4f; animation-delay: 0.7s; }
    .tech-chip:nth-child(7) { top: 30%; left: -40px; color: #8892bf; animation-delay: 2s; }

    [data-theme="light"] .tech-chip {
      background: rgba(248,248,252,0.9);
    }

    @keyframes chip-float {
      0% { transform: translateY(0); }
      100% { transform: translateY(-12px); }
    }

    /* Stat chips */
    .hero-stats {
      display: flex;
      gap: 24px;
      margin-top: 48px;
      animation: fade-up 1s var(--ease-out) 0.9s both;
    }

    .stat-item {
      text-align: left;
    }

    .stat-num {
      font-family: 'Syne', sans-serif;
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--text);
      line-height: 1;
    }

    .stat-label {
      font-size: 0.75rem;
      color: var(--text-3);
      margin-top: 4px;
    }

    .stat-divider {
      width: 1px;
      background: var(--border-2);
    }

    /* Scroll indicator */
    .scroll-indicator {
      position: absolute;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      color: var(--text-3);
      font-size: 0.7rem;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      animation: fade-up 1s var(--ease-out) 1.2s both;
    }

    .scroll-line {
      width: 1px;
      height: 48px;
      background: linear-gradient(to bottom, var(--accent-2), transparent);
      animation: scroll-line 1.5s ease-in-out infinite;
    }

    @keyframes scroll-line {
      0% { opacity: 0; transform: scaleY(0); transform-origin: top; }
      50% { opacity: 1; transform: scaleY(1); }
      100% { opacity: 0; transform: scaleY(0); transform-origin: bottom; }
    }

    /* ============================================================
       ABOUT SECTION
    ============================================================ */
    #about {
      background: var(--bg-2);
    }

    .about-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: center;
    }

    .about-visual {
      position: relative;
    }

    .about-card {
      position: relative;
      padding: 48px;
      border-radius: var(--r-xl);
      background: var(--bg-3);
      border: 1px solid var(--border);
      overflow: hidden;
    }

    .about-card::before {
      content: '';
      position: absolute;
      top: -1px; left: 40px;
      width: 120px; height: 2px;
      background: linear-gradient(90deg, var(--accent), transparent);
    }

    .about-avatar-large {
      width: 100px; height: 100px;
      border-radius: var(--r-lg);
      background: linear-gradient(135deg, var(--accent), var(--teal));
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Syne', sans-serif;
      font-size: 2.5rem;
      font-weight: 800;
      color: #fff;
      margin-bottom: 24px;
    }

    .about-name-card {
      font-family: 'Syne', sans-serif;
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 4px;
    }

    .about-role-card {
      color: var(--accent-2);
      font-size: 0.875rem;
      font-family: 'Space Mono', monospace;
      margin-bottom: 24px;
    }

    .about-info-rows {
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .about-info-row {
      display: flex;
      align-items: center;
      gap: 12px;
      font-size: 0.9rem;
      color: var(--text-2);
    }

    .about-info-row i {
      width: 20px;
      color: var(--accent-2);
    }

    .about-deco-card {
      position: absolute;
      bottom: -20px; right: -20px;
      width: 120px; height: 120px;
      border-radius: var(--r-lg);
      background: linear-gradient(135deg, rgba(108,92,231,0.15), rgba(0,206,201,0.1));
      border: 1px solid var(--border-2);
      backdrop-filter: blur(8px);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.5rem;
    }

    .about-text h3 {
      font-family: 'Syne', sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 16px;
      color: var(--accent-2);
    }

    .about-text p {
      color: var(--text-2);
      margin-bottom: 20px;
      font-size: 1rem;
    }

    .about-values {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 32px;
    }

    .value-tag {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 8px 16px;
      border-radius: 100px;
      background: var(--surface);
      border: 1px solid var(--border);
      font-size: 0.8rem;
      color: var(--text-2);
      transition: all 0.3s;
    }

    .value-tag:hover {
      background: var(--glow);
      border-color: var(--accent);
      color: var(--accent-2);
    }

    .value-tag i { font-size: 0.75rem; color: var(--accent-2); }

    /* ============================================================
       SKILLS SECTION
    ============================================================ */
    .skills-header {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 60px;
      align-items: start;
      margin-bottom: 80px;
    }

    .skills-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .skill-card {
      padding: 28px;
      border-radius: var(--r-lg);
      background: var(--surface);
      border: 1px solid var(--border);
      transition: all 0.4s var(--ease-out);
      cursor: default;
      position: relative;
      overflow: hidden;
    }

    .skill-card::before {
      content: '';
      position: absolute;
      inset: 0;
      opacity: 0;
      transition: opacity 0.4s;
      background: radial-gradient(circle at 50% 0%, var(--glow), transparent 70%);
    }

    .skill-card:hover {
      transform: translateY(-6px);
      border-color: var(--accent);
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .skill-card:hover::before { opacity: 1; }

    .skill-icon {
      width: 52px; height: 52px;
      border-radius: var(--r-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      margin-bottom: 16px;
      position: relative;
    }

    .skill-name {
      font-family: 'Syne', sans-serif;
      font-weight: 600;
      font-size: 1rem;
      margin-bottom: 4px;
    }

    .skill-level-label {
      font-size: 0.78rem;
      color: var(--text-3);
      margin-bottom: 14px;
    }

    .skill-bar {
      height: 4px;
      background: var(--surface-2);
      border-radius: 100px;
      overflow: hidden;
    }

    .skill-bar-fill {
      height: 100%;
      border-radius: 100px;
      width: 0;
      transition: width 1.2s var(--ease-out);
    }

    /* ============================================================
       SERVICES SECTION
    ============================================================ */
    #services {
      background: var(--bg-2);
    }

    .services-header {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 60px;
      align-items: end;
      margin-bottom: 64px;
    }

    .services-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
    }

    .service-card {
      padding: 40px 32px;
      border-radius: var(--r-xl);
      background: var(--bg-3);
      border: 1px solid var(--border);
      position: relative;
      overflow: hidden;
      transition: all 0.5s var(--ease-out);
      group: true;
    }

    .service-card::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0;
      width: 100%; height: 2px;
      background: linear-gradient(90deg, var(--accent), var(--teal));
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.5s var(--ease-out);
    }

    .service-card:hover {
      transform: translateY(-8px);
      border-color: var(--border-2);
      box-shadow: 0 24px 60px rgba(0,0,0,0.35);
    }

    .service-card:hover::after { transform: scaleX(1); }

    .service-num {
      font-family: 'Space Mono', monospace;
      font-size: 0.7rem;
      color: var(--text-3);
      letter-spacing: 0.1em;
      margin-bottom: 24px;
    }

    .service-icon-wrap {
      width: 64px; height: 64px;
      border-radius: var(--r-md);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.6rem;
      margin-bottom: 24px;
      transition: transform 0.4s var(--ease-out);
    }

    .service-card:hover .service-icon-wrap {
      transform: scale(1.1) rotate(-3deg);
    }

    .service-title {
      font-family: 'Syne', sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 12px;
    }

    .service-desc {
      color: var(--text-2);
      font-size: 0.9rem;
      line-height: 1.7;
      margin-bottom: 24px;
    }

    .service-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
    }

    .service-tag {
      padding: 4px 12px;
      border-radius: 100px;
      background: var(--surface);
      border: 1px solid var(--border);
      font-size: 0.72rem;
      color: var(--text-3);
    }

    /* ============================================================
       PROJECTS SECTION
    ============================================================ */
    .projects-header {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      margin-bottom: 64px;
    }

    .projects-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 28px;
    }

    .projects-grid .project-card:first-child {
      grid-column: 1 / -1;
    }

    .project-card {
      border-radius: var(--r-xl);
      background: var(--bg-3);
      border: 1px solid var(--border);
      overflow: hidden;
      position: relative;
      transition: all 0.5s var(--ease-out);
    }

    .project-card:hover {
      transform: translateY(-6px);
      border-color: var(--border-2);
      box-shadow: 0 32px 80px rgba(0,0,0,0.4);
    }

    .project-preview {
      position: relative;
      height: 240px;
      overflow: hidden;
    }

    .projects-grid .project-card:first-child .project-preview {
      height: 320px;
    }

    .project-preview-bg {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: transform 0.6s var(--ease-out);
    }

    .project-card:hover .project-preview-bg {
      transform: scale(1.05);
    }

    .project-preview-icon {
      font-size: 5rem;
      opacity: 0.15;
    }

    .project-preview-deco {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, transparent, rgba(0,0,0,0.3));
    }

    .project-overlay {
      position: absolute;
      inset: 0;
      background: rgba(5,5,10,0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 16px;
      opacity: 0;
      transition: opacity 0.4s;
    }

    .project-card:hover .project-overlay { opacity: 1; }

    .project-overlay-btn {
      width: 48px; height: 48px;
      border-radius: 50%;
      background: var(--surface-2);
      border: 1px solid var(--border-2);
      color: var(--text);
      display: flex; align-items: center; justify-content: center;
      font-size: 1rem;
      transition: all 0.3s;
    }

    .project-overlay-btn:hover {
      background: var(--accent);
      border-color: var(--accent);
      color: #fff;
      transform: scale(1.1);
    }

    .project-info {
      padding: 28px;
    }

    .project-category {
      font-family: 'Space Mono', monospace;
      font-size: 0.7rem;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--accent-2);
      margin-bottom: 10px;
    }

    .project-title {
      font-family: 'Syne', sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .project-desc {
      font-size: 0.875rem;
      color: var(--text-2);
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .project-tech-list {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .project-tech {
      padding: 4px 12px;
      border-radius: 100px;
      background: var(--surface);
      font-size: 0.72rem;
      color: var(--text-3);
      border: 1px solid var(--border);
    }

    /* ============================================================
       PARCOURS / TIMELINE
    ============================================================ */
    #parcours {
      background: var(--bg-2);
    }

    .parcours-layout {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: start;
    }

    .timeline {
      position: relative;
    }

    .timeline::before {
      content: '';
      position: absolute;
      left: 18px;
      top: 0; bottom: 0;
      width: 1px;
      background: linear-gradient(to bottom, var(--accent), transparent);
    }

    .timeline-item {
      padding-left: 56px;
      padding-bottom: 48px;
      position: relative;
    }

    .timeline-item::before {
      content: '';
      position: absolute;
      left: 10px; top: 4px;
      width: 17px; height: 17px;
      border-radius: 50%;
      background: var(--accent);
      border: 3px solid var(--bg-2);
      box-shadow: 0 0 0 3px var(--accent), 0 0 20px var(--glow);
    }

    .timeline-date {
      font-family: 'Space Mono', monospace;
      font-size: 0.75rem;
      color: var(--accent-2);
      letter-spacing: 0.1em;
      margin-bottom: 8px;
    }

    .timeline-title {
      font-family: 'Syne', sans-serif;
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 4px;
    }

    .timeline-org {
      color: var(--text-3);
      font-size: 0.85rem;
      margin-bottom: 12px;
    }

    .timeline-desc {
      color: var(--text-2);
      font-size: 0.875rem;
      line-height: 1.7;
    }

    /* Certifications */
    .certif-grid {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .certif-card {
      display: flex;
      align-items: center;
      gap: 20px;
      padding: 20px 24px;
      border-radius: var(--r-lg);
      background: var(--surface);
      border: 1px solid var(--border);
      transition: all 0.3s var(--ease-out);
    }

    .certif-card:hover {
      border-color: var(--accent);
      background: var(--glow);
      transform: translateX(6px);
    }

    .certif-icon {
      width: 44px; height: 44px;
      border-radius: var(--r-sm);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.2rem;
      flex-shrink: 0;
    }

    .certif-info h4 {
      font-family: 'Syne', sans-serif;
      font-size: 0.95rem;
      font-weight: 600;
      margin-bottom: 2px;
    }

    .certif-info p {
      font-size: 0.8rem;
      color: var(--text-3);
    }

    /* ============================================================
       COUNTER STATS SECTION
    ============================================================ */
    #stats {
      padding: 80px 0;
      background: var(--bg);
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 40px;
      text-align: center;
    }

    .stat-block {
      position: relative;
    }

    .stat-block-num {
      font-family: 'Syne', sans-serif;
      font-size: 3.5rem;
      font-weight: 800;
      line-height: 1;
      background: linear-gradient(135deg, var(--accent-2), var(--teal));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 8px;
    }

    .stat-block-label {
      color: var(--text-2);
      font-size: 0.9rem;
    }

    /* ============================================================
       GALERIE / CREATIVE
    ============================================================ */
    #galerie {
      background: var(--bg-2);
      overflow: hidden;
    }

    .galerie-marquee-wrap {
      margin-top: 64px;
      overflow: hidden;
    }

    .marquee-track {
      display: flex;
      gap: 20px;
      animation: marquee 25s linear infinite;
      width: max-content;
    }

    .marquee-track-reverse {
      animation-direction: reverse;
      margin-top: 16px;
    }

    @keyframes marquee {
      from { transform: translateX(0); }
      to { transform: translateX(-50%); }
    }

    .marquee-card {
      width: 260px;
      height: 180px;
      border-radius: var(--r-lg);
      background: var(--bg-3);
      border: 1px solid var(--border);
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      gap: 12px;
      font-size: 2.5rem;
      position: relative;
      overflow: hidden;
    }

    .marquee-card-label {
      font-family: 'Space Mono', monospace;
      font-size: 0.7rem;
      color: var(--text-3);
      letter-spacing: 0.1em;
    }

    .marquee-card::before {
      content: '';
      position: absolute;
      inset: 0;
      opacity: 0.05;
      background: radial-gradient(circle at 50% 50%, white, transparent);
    }

    /* ============================================================
       TESTIMONIALS
    ============================================================ */
    .testimonials-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
      margin-top: 64px;
    }

    .testimonial-card {
      padding: 32px;
      border-radius: var(--r-xl);
      background: var(--bg-3);
      border: 1px solid var(--border);
      position: relative;
      overflow: hidden;
      transition: all 0.4s var(--ease-out);
    }

    .testimonial-card:hover {
      border-color: var(--border-2);
      transform: translateY(-4px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .testimonial-quote {
      font-size: 2.5rem;
      color: var(--accent);
      line-height: 1;
      margin-bottom: 16px;
      font-family: 'Syne', sans-serif;
    }

    .testimonial-text {
      color: var(--text-2);
      font-size: 0.9rem;
      line-height: 1.75;
      margin-bottom: 24px;
    }

    .testimonial-author {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .author-avatar {
      width: 44px; height: 44px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--accent), var(--teal));
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Syne', sans-serif;
      font-weight: 700;
      font-size: 0.9rem;
      color: #fff;
    }

    .author-name {
      font-family: 'Syne', sans-serif;
      font-weight: 600;
      font-size: 0.9rem;
    }

    .author-role {
      font-size: 0.775rem;
      color: var(--text-3);
    }

    .stars { color: var(--gold); font-size: 0.8rem; margin-top: 4px; }

    /* ============================================================
       CONTACT SECTION
    ============================================================ */
    #contact {
      background: var(--bg-2);
    }

    .contact-layout {
      display: grid;
      grid-template-columns: 1fr 1.4fr;
      gap: 80px;
      align-items: start;
    }

    .contact-info h3 {
      font-family: 'Syne', sans-serif;
      font-size: 2rem;
      font-weight: 800;
      margin-bottom: 16px;
    }

    .contact-info p {
      color: var(--text-2);
      margin-bottom: 48px;
    }

    .contact-items {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .contact-item {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .contact-icon {
      width: 48px; height: 48px;
      border-radius: var(--r-sm);
      background: var(--glow);
      border: 1px solid var(--accent);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
      color: var(--accent-2);
      flex-shrink: 0;
      transition: all 0.3s;
    }

    .contact-item:hover .contact-icon {
      background: var(--accent);
      color: #fff;
      transform: scale(1.1);
    }

    .contact-item-text strong {
      display: block;
      font-family: 'Syne', sans-serif;
      font-size: 0.9rem;
      font-weight: 600;
      margin-bottom: 2px;
    }

    .contact-item-text span {
      font-size: 0.85rem;
      color: var(--text-2);
    }

    .social-links {
      display: flex;
      gap: 12px;
      margin-top: 40px;
    }

    .social-btn {
      width: 44px; height: 44px;
      border-radius: 50%;
      background: var(--surface);
      border: 1px solid var(--border-2);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--text-2);
      font-size: 1rem;
      transition: all 0.3s var(--ease-out);
    }

    .social-btn:hover {
      background: var(--accent);
      border-color: var(--accent);
      color: #fff;
      transform: translateY(-4px) rotate(-5deg);
    }

    /* Contact Form */
    .contact-form {
      background: var(--bg-3);
      border: 1px solid var(--border);
      border-radius: var(--r-xl);
      padding: 48px;
      position: relative;
      overflow: hidden;
    }

    .contact-form::before {
      content: '';
      position: absolute;
      top: -1px; left: 80px;
      width: 160px; height: 2px;
      background: linear-gradient(90deg, var(--accent), var(--teal), transparent);
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      font-size: 0.8rem;
      font-weight: 500;
      color: var(--text-2);
      margin-bottom: 8px;
      letter-spacing: 0.04em;
    }

    .form-control {
      width: 100%;
      padding: 14px 18px;
      border-radius: var(--r-md);
      background: var(--surface);
      border: 1px solid var(--border);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      font-size: 0.9rem;
      outline: none;
      transition: all 0.3s;
      resize: none;
    }

    .form-control:focus {
      border-color: var(--accent);
      background: rgba(108,92,231,0.05);
      box-shadow: 0 0 0 4px rgba(108,92,231,0.1);
    }

    .form-control::placeholder { color: var(--text-3); }

    textarea.form-control { min-height: 140px; }

    .form-submit {
      width: 100%;
      padding: 16px;
      border-radius: var(--r-md);
      background: linear-gradient(135deg, var(--accent), #9b59b6);
      color: #fff;
      font-family: 'Syne', sans-serif;
      font-weight: 600;
      font-size: 1rem;
      letter-spacing: 0.02em;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      transition: all 0.4s var(--ease-out);
      position: relative;
      overflow: hidden;
    }

    .form-submit:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 40px var(--glow);
    }

    .form-submit i { transition: transform 0.3s; }
    .form-submit:hover i { transform: translateX(4px) rotate(-20deg); }

    /* ============================================================
       FOOTER
    ============================================================ */
    footer {
      background: var(--bg);
      border-top: 1px solid var(--border);
      padding: 60px 0 32px;
      position: relative;
      z-index: 2;
    }

    .footer-inner {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 60px;
      margin-bottom: 48px;
    }

    .footer-brand-text {
      font-size: 0.875rem;
      color: var(--text-3);
      margin-top: 12px;
      margin-bottom: 24px;
      line-height: 1.7;
    }

    .footer-title {
      font-family: 'Syne', sans-serif;
      font-size: 0.875rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.12em;
      color: var(--text-2);
      margin-bottom: 20px;
    }

    .footer-links {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .footer-links a {
      font-size: 0.875rem;
      color: var(--text-3);
      transition: color 0.3s, transform 0.3s;
      display: inline-block;
    }

    .footer-links a:hover {
      color: var(--accent-2);
      transform: translateX(4px);
    }

    .footer-bottom {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding-top: 24px;
      border-top: 1px solid var(--border);
    }

    .footer-copy {
      font-size: 0.8rem;
      color: var(--text-3);
    }

    .footer-copy span { color: var(--accent-2); }

    .footer-made {
      font-size: 0.8rem;
      color: var(--text-3);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .footer-made i { color: var(--pink); animation: heartbeat 1.5s ease infinite; }

    @keyframes heartbeat {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.3); }
    }

    /* ============================================================
       GENERAL ANIMATIONS
    ============================================================ */
    @keyframes fade-up {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: none; }
    }

    @keyframes fade-down {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: none; }
    }

    @keyframes fade-left {
      from { opacity: 0; transform: translateX(50px); }
      to { opacity: 1; transform: none; }
    }

    /* Glow dividers */
    .glow-divider {
      width: 100%;
      height: 1px;
      background: linear-gradient(90deg, transparent, var(--accent), transparent);
      margin: 0;
      opacity: 0.5;
    }

    /* ============================================================
       RESPONSIVE
    ============================================================ */
    @media (max-width: 1024px) {
      .hero-content { grid-template-columns: 1fr; gap: 60px; }
      .hero-visual { display: none; }
      .about-grid { grid-template-columns: 1fr; gap: 40px; }
      .skills-header { grid-template-columns: 1fr; gap: 24px; }
      .skills-grid { grid-template-columns: repeat(2, 1fr); }
      .services-header { grid-template-columns: 1fr; }
      .services-grid { grid-template-columns: 1fr; }
      .projects-grid { grid-template-columns: 1fr; }
      .projects-grid .project-card:first-child { grid-column: 1; }
      .parcours-layout { grid-template-columns: 1fr; }
      .stats-grid { grid-template-columns: repeat(2, 1fr); }
      .testimonials-grid { grid-template-columns: 1fr; }
      .contact-layout { grid-template-columns: 1fr; }
      .footer-inner { grid-template-columns: 1fr 1fr; gap: 40px; }
    }

    @media (max-width: 768px) {
      .container { padding: 0 20px; }
      .section { padding: 80px 0; }
      .nav-links { display: none; }
      .nav-cta { display: none; }
      .hamburger { display: flex; }
      .mobile-nav { display: flex; }
      .skills-grid { grid-template-columns: 1fr; }
      .form-row { grid-template-columns: 1fr; }
      .footer-inner { grid-template-columns: 1fr; }
      .footer-bottom { flex-direction: column; gap: 12px; text-align: center; }
      body { cursor: auto; }
      #cursor-dot, #cursor-ring { display: none; }
      .hero-stats { gap: 16px; }
      .stat-num { font-size: 1.4rem; }
    }

    /* Progress bar top */
    #progress-bar {
      position: fixed;
      top: 0; left: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--accent), var(--teal));
      z-index: 200;
      transition: width 0.1s;
      box-shadow: 0 0 10px var(--glow);
    }
  </style>
</head>
<body>

<!-- ============================================================
     CUSTOM CURSOR
============================================================ -->
<div id="cursor-dot"></div>
<div id="cursor-ring"></div>

<!-- Progress Bar -->
<div id="progress-bar"></div>

<!-- Particles Canvas -->
<canvas id="particles-canvas"></canvas>

<!-- ============================================================
     MOBILE NAV
============================================================ -->
<nav class="mobile-nav" id="mobileNav">
  <a href="#about" onclick="closeMobileNav()">À propos</a>
  <a href="#skills" onclick="closeMobileNav()">Compétences</a>
  <a href="#services" onclick="closeMobileNav()">Services</a>
  <a href="#projects" onclick="closeMobileNav()">Projets</a>
  <a href="#parcours" onclick="closeMobileNav()">Parcours</a>
  <a href="#contact" onclick="closeMobileNav()">Contact</a>
</nav>

<!-- ============================================================
     NAVBAR
============================================================ -->
<header id="navbar">
  <div class="container">
    <div class="nav-inner">
      <a href="#hero" class="nav-logo">ZB.</a>
      <nav class="nav-links">
        <a href="#about">À propos</a>
        <a href="#skills">Compétences</a>
        <a href="#services">Services</a>
        <a href="#projects">Projets</a>
        <a href="#parcours">Parcours</a>
        <a href="#contact">Contact</a>
      </nav>
      <div class="nav-actions">
        <button class="theme-btn" id="themeToggle" aria-label="Toggle theme">
          <i class="fas fa-moon" id="themeIcon"></i>
        </button>
        <a href="#contact" class="nav-cta">Recruter</a>
        <button class="hamburger" id="hamburger" aria-label="Menu">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>
  </div>
</header>

<!-- ============================================================
     HERO SECTION
============================================================ -->
<section id="hero">
  <!-- BG elements -->
  <div class="hero-bg-blob hero-blob-1"></div>
  <div class="hero-bg-blob hero-blob-2"></div>
  <div class="hero-bg-blob hero-blob-3"></div>
  <div class="grid-overlay"></div>

  <div class="container" style="width:100%">
    <div class="hero-content">

      <!-- LEFT: Text -->
      <div>
        <div class="hero-badge">
          <div class="badge-dot"></div>
          Disponible pour stage &amp; freelance
        </div>

        <h1 class="hero-name">
          Zakaria<br>
          <span class="highlight">Benjrada</span>
        </h1>

        <div class="hero-title-wrapper">
          <p class="hero-title">&gt; <span class="typed-text" id="typedText"></span></p>
        </div>

        <p class="hero-slogan">
          Étudiant passionné de 20 ans, je crée des expériences digitales modernes, intuitives et impactantes. Chaque ligne de code est une nouvelle opportunité d'innover.
        </p>

        <div class="hero-actions">
          <a href="#projects" class="btn-primary">
            Voir mes projets <i class="fas fa-arrow-right"></i>
          </a>
          <a href="#contact" class="btn-secondary">
            <i class="fas fa-paper-plane"></i> Me contacter
          </a>
        </div>

        <div class="hero-stats">
          <div class="stat-item">
            <div class="stat-num">20</div>
            <div class="stat-label">Ans d'âge</div>
          </div>
          <div class="stat-divider"></div>
          <div class="stat-item">
            <div class="stat-num">5+</div>
            <div class="stat-label">Projets réalisés</div>
          </div>
          <div class="stat-divider"></div>
          <div class="stat-item">
            <div class="stat-num">6+</div>
            <div class="stat-label">Technologies maîtrisées</div>
          </div>
        </div>
      </div>

      <!-- RIGHT: Visual -->
      <div class="hero-visual">
        <div class="hero-avatar-wrap">
          <div class="avatar-ring-1"></div>
          <div class="avatar-ring-2"></div>
          <div class="avatar-card">
            <div class="avatar-glow"></div>
            <div class="avatar-initials">ZB</div>
          </div>
          <!-- Tech chips -->
          <div class="tech-chip"><i class="fab fa-html5"></i> HTML5</div>
          <div class="tech-chip"><i class="fab fa-css3-alt"></i> CSS3</div>
          <div class="tech-chip"><i class="fab fa-js"></i> JS</div>
          <div class="tech-chip"><i class="fab fa-php"></i> PHP</div>
        </div>
      </div>

    </div>
  </div>

  <!-- Scroll indicator -->
  <div class="scroll-indicator">
    <div class="scroll-line"></div>
    Scroll
  </div>
</section>

<div class="glow-divider"></div>

<!-- ============================================================
     STATS COUNTER SECTION
============================================================ -->
<section id="stats">
  <div class="container">
    <div class="stats-grid">
      <div class="stat-block reveal">
        <div class="stat-block-num"><span class="counter" data-target="5">0</span>+</div>
        <div class="stat-block-label">Projets réalisés</div>
      </div>
      <div class="stat-block reveal reveal-delay-2">
        <div class="stat-block-num"><span class="counter" data-target="6">0</span>+</div>
        <div class="stat-block-label">Technologies maîtrisées</div>
      </div>
      <div class="stat-block reveal reveal-delay-3">
        <div class="stat-block-num"><span class="counter" data-target="100">0</span>%</div>
        <div class="stat-block-label">Motivation & investissement</div>
      </div>
      <div class="stat-block reveal reveal-delay-4">
        <div class="stat-block-num"><span class="counter" data-target="2">0</span> ans</div>
        <div class="stat-block-label">D'apprentissage intensif</div>
      </div>
    </div>
  </div>
</section>

<div class="glow-divider"></div>

<!-- ============================================================
     ABOUT SECTION
============================================================ -->
<section id="about" class="section">
  <div class="container">
    <div class="about-grid">

      <!-- Visual Card -->
      <div class="about-visual reveal reveal-left">
        <div class="about-card">
          <div class="about-avatar-large">ZB</div>
          <div class="about-name-card">Zakaria Benjrada</div>
          <div class="about-role-card">// Stagiaire Développement Digital</div>
          <div class="about-info-rows">
            <div class="about-info-row">
              <i class="fas fa-calendar"></i> 20 ans — né en 2004
            </div>
            <div class="about-info-row">
              <i class="fas fa-map-marker-alt"></i> Maroc
            </div>
            <div class="about-info-row">
              <i class="fas fa-graduation-cap"></i> Développement Digital
            </div>
            <div class="about-info-row">
              <i class="fas fa-language"></i> Arabe · Français · Anglais
            </div>
            <div class="about-info-row">
              <i class="fas fa-star"></i> Disponible immédiatement
            </div>
          </div>
        </div>
        <div class="about-deco-card">🚀</div>
      </div>

      <!-- Text -->
      <div class="about-text reveal reveal-right">
        <div class="section-label">À propos de moi</div>
        <h2 class="section-title">Développeur passionné, <span>créatif</span> et ambitieux</h2>
        <h3>Qui suis-je ?</h3>
        <p>
          Je suis Zakaria Benjrada, étudiant de 20 ans en développement digital, passionné par la création d'interfaces web modernes, performantes et visuellement marquantes. Mon objectif est de transformer des idées en expériences digitales mémorables.
        </p>
        <p>
          Actuellement en stage, je combine apprentissage théorique et pratique terrain pour évoluer rapidement vers un profil de développeur fullstack. Je crois fermement que le code est un art autant qu'une technique.
        </p>
        <p>
          Curieux, motivé et toujours en veille technologique, je suis prêt à relever tous les défis pour contribuer à des projets ambitieux et innovants.
        </p>

        <div class="about-values">
          <span class="value-tag"><i class="fas fa-bolt"></i> Réactif</span>
          <span class="value-tag"><i class="fas fa-palette"></i> Créatif</span>
          <span class="value-tag"><i class="fas fa-brain"></i> Curieux</span>
          <span class="value-tag"><i class="fas fa-users"></i> Travail d'équipe</span>
          <span class="value-tag"><i class="fas fa-chart-line"></i> Ambitieux</span>
          <span class="value-tag"><i class="fas fa-clock"></i> Ponctuel</span>
          <span class="value-tag"><i class="fas fa-sync"></i> Apprentissage continu</span>
          <span class="value-tag"><i class="fas fa-code"></i> Passionné</span>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="glow-divider"></div>

<!-- ============================================================
     SKILLS SECTION
============================================================ -->
<section id="skills" class="section">
  <div class="container">
    <div class="skills-header">
      <div class="reveal">
        <div class="section-label">Compétences techniques</div>
        <h2 class="section-title">Mes <span>technologies</span> de prédilection</h2>
      </div>
      <div class="reveal reveal-delay-2">
        <p class="section-sub">De la structure HTML à l'interactivité JavaScript en passant par le style CSS et la logique PHP — je maîtrise toute la chaîne du développement web front-end et back-end.</p>
      </div>
    </div>

    <div class="skills-grid">

      <!-- HTML -->
      <div class="skill-card reveal">
        <div class="skill-icon" style="background: rgba(227,76,38,0.12);">
          <i class="fab fa-html5" style="color:#e34c26"></i>
        </div>
        <div class="skill-name">HTML5</div>
        <div class="skill-level-label">Avancé</div>
        <div class="skill-bar">
          <div class="skill-bar-fill" data-width="92" style="background: linear-gradient(90deg, #e34c26, #f06529)"></div>
        </div>
      </div>

      <!-- CSS -->
      <div class="skill-card reveal reveal-delay-1">
        <div class="skill-icon" style="background: rgba(41,101,241,0.12);">
          <i class="fab fa-css3-alt" style="color:#2965f1"></i>
        </div>
        <div class="skill-name">CSS3</div>
        <div class="skill-level-label">Avancé</div>
        <div class="skill-bar">
          <div class="skill-bar-fill" data-width="88" style="background: linear-gradient(90deg, #2965f1, #1478d4)"></div>
        </div>
      </div>

      <!-- JavaScript -->
      <div class="skill-card reveal reveal-delay-2">
        <div class="skill-icon" style="background: rgba(240,219,79,0.12);">
          <i class="fab fa-js" style="color:#f0db4f"></i>
        </div>
        <div class="skill-name">JavaScript</div>
        <div class="skill-level-label">Intermédiaire</div>
        <div class="skill-bar">
          <div class="skill-bar-fill" data-width="75" style="background: linear-gradient(90deg, #f0db4f, #e8c534)"></div>
        </div>
      </div>

      <!-- PHP -->
      <div class="skill-card reveal reveal-delay-3">
        <div class="skill-icon" style="background: rgba(136,146,191,0.12);">
          <i class="fab fa-php" style="color:#8892bf"></i>
        </div>
        <div class="skill-name">PHP</div>
        <div class="skill-level-label">Intermédiaire</div>
        <div class="skill-bar">
          <div class="skill-bar-fill" data-width="68" style="background: linear-gradient(90deg, #8892bf, #7176b0)"></div>
        </div>
      </div>

      <!-- UI/UX Design -->
      <div class="skill-card reveal reveal-delay-4">
        <div class="skill-icon" style="background: rgba(253,121,168,0.12);">
          <i class="fas fa-paint-brush" style="color:#fd79a8"></i>
        </div>
        <div class="skill-name">UI/UX Design</div>
        <div class="skill-level-label">Intermédiaire</div>
        <div class="skill-bar">
          <div class="skill-bar-fill" data-width="72" style="background: linear-gradient(90deg, #fd79a8, #e84393)"></div>
        </div>
      </div>

      <!-- Responsive -->
      <div class="skill-card reveal reveal-delay-5">
        <div class="skill-icon" style="background: rgba(0,206,201,0.12);">
          <i class="fas fa-mobile-alt" style="color:#00cec9"></i>
        </div>
        <div class="skill-name">Responsive Design</div>
        <div class="skill-level-label">Avancé</div>
        <div class="skill-bar">
          <div class="skill-bar-fill" data-width="85" style="background: linear-gradient(90deg, #00cec9, #00b5b0)"></div>
        </div>
      </div>

    </div>
  </div>
</section>

<div class="glow-divider"></div>

<!-- ============================================================
     SERVICES SECTION
============================================================ -->
<section id="services" class="section">
  <div class="container">
    <div class="services-header">
      <div class="reveal">
        <div class="section-label">Ce que je propose</div>
        <h2 class="section-title">Mes <span>services</span></h2>
      </div>
      <div class="reveal reveal-delay-2">
        <p class="section-sub">Des solutions digitales complètes, pensées pour vos besoins, avec une attention particulière portée à l'expérience utilisateur et à la performance.</p>
      </div>
    </div>

    <div class="services-grid">

      <div class="service-card reveal">
        <div class="service-num">01</div>
        <div class="service-icon-wrap" style="background: rgba(108,92,231,0.12);">
          <i class="fas fa-code" style="color:var(--accent-2)"></i>
        </div>
        <h3 class="service-title">Développement Web Front-End</h3>
        <p class="service-desc">Création d'interfaces web modernes, responsives et performantes avec HTML5, CSS3 et JavaScript. Du design pixel-perfect au code propre et maintenable.</p>
        <div class="service-tags">
          <span class="service-tag">HTML5</span>
          <span class="service-tag">CSS3</span>
          <span class="service-tag">JavaScript</span>
          <span class="service-tag">Animations</span>
        </div>
      </div>

      <div class="service-card reveal reveal-delay-2">
        <div class="service-num">02</div>
        <div class="service-icon-wrap" style="background: rgba(0,206,201,0.12);">
          <i class="fas fa-layer-group" style="color:var(--teal)"></i>
        </div>
        <h3 class="service-title">Design UI/UX</h3>
        <p class="service-desc">Conception d'interfaces intuitives et visuellement attractives, centrées sur l'expérience utilisateur. Maquettes, prototypes et guides de style.</p>
        <div class="service-tags">
          <span class="service-tag">Figma</span>
          <span class="service-tag">Wireframing</span>
          <span class="service-tag">Prototypage</span>
          <span class="service-tag">Design System</span>
        </div>
      </div>

      <div class="service-card reveal reveal-delay-3">
        <div class="service-num">03</div>
        <div class="service-icon-wrap" style="background: rgba(253,121,168,0.12);">
          <i class="fas fa-mobile-alt" style="color:var(--pink)"></i>
        </div>
        <h3 class="service-title">Responsive & Cross-Browser</h3>
        <p class="service-desc">Optimisation complète pour tous les appareils et navigateurs. Expérience utilisateur cohérente du mobile au desktop grand écran.</p>
        <div class="service-tags">
          <span class="service-tag">Mobile First</span>
          <span class="service-tag">Grid Layout</span>
          <span class="service-tag">Flexbox</span>
          <span class="service-tag">Media Queries</span>
        </div>
      </div>

      <div class="service-card reveal reveal-delay-1">
        <div class="service-num">04</div>
        <div class="service-icon-wrap" style="background: rgba(255,209,102,0.12);">
          <i class="fas fa-database" style="color:var(--gold)"></i>
        </div>
        <h3 class="service-title">Développement Back-End PHP</h3>
        <p class="service-desc">Développement d'applications web dynamiques avec PHP. Gestion de bases de données, formulaires, authentification et logique serveur.</p>
        <div class="service-tags">
          <span class="service-tag">PHP</span>
          <span class="service-tag">MySQL</span>
          <span class="service-tag">CRUD</span>
          <span class="service-tag">APIs</span>
        </div>
      </div>

      <div class="service-card reveal reveal-delay-2">
        <div class="service-num">05</div>
        <div class="service-icon-wrap" style="background: rgba(108,92,231,0.12);">
          <i class="fas fa-rocket" style="color:var(--accent-2)"></i>
        </div>
        <h3 class="service-title">Optimisation & Performance</h3>
        <p class="service-desc">Audit et optimisation des performances web. Réduction du temps de chargement, SEO technique, bonnes pratiques et accessibilité.</p>
        <div class="service-tags">
          <span class="service-tag">SEO</span>
          <span class="service-tag">Performance</span>
          <span class="service-tag">Accessibilité</span>
          <span class="service-tag">Core Web Vitals</span>
        </div>
      </div>

      <div class="service-card reveal reveal-delay-3">
        <div class="service-num">06</div>
        <div class="service-icon-wrap" style="background: rgba(0,206,201,0.12);">
          <i class="fas fa-magic" style="color:var(--teal)"></i>
        </div>
        <h3 class="service-title">Animations & Interactions</h3>
        <p class="service-desc">Création d'animations CSS et JavaScript fluides et non-intrusives pour des interfaces vivantes et engageantes qui marquent les esprits.</p>
        <div class="service-tags">
          <span class="service-tag">CSS Animations</span>
          <span class="service-tag">GSAP</span>
          <span class="service-tag">Micro-interactions</span>
          <span class="service-tag">ScrollTrigger</span>
        </div>
      </div>

    </div>
  </div>
</section>

<div class="glow-divider"></div>

<!-- ============================================================
     PROJECTS SECTION
============================================================ -->
<section id="projects" class="section">
  <div class="container">
    <div class="projects-header">
      <div class="reveal">
        <div class="section-label">Portfolio</div>
        <h2 class="section-title">Projets <span>réalisés</span></h2>
      </div>
      <div class="reveal reveal-delay-2">
        <p class="section-sub">Des projets concrets, réalisés avec passion et rigueur.</p>
      </div>
    </div>

    <div class="projects-grid">

      <!-- Project 1 — Featured -->
      <div class="project-card reveal">
        <div class="project-preview">
          <div class="project-preview-bg" style="background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);">
            <i class="fas fa-shopping-cart project-preview-icon" style="color:var(--accent-2)"></i>
            <div class="project-preview-deco"></div>
          </div>
          <div class="project-overlay">
            <a href="#" class="project-overlay-btn" title="Voir le projet"><i class="fas fa-eye"></i></a>
            <a href="#" class="project-overlay-btn" title="Code source"><i class="fab fa-github"></i></a>
          </div>
        </div>
        <div class="project-info">
          <div class="project-category">E-Commerce · Projet Principal</div>
          <h3 class="project-title">Boutique En Ligne — ZShop</h3>
          <p class="project-desc">Application e-commerce complète avec catalogue produits, panier d'achats, système d'authentification, gestion des commandes et panneau d'administration. Interface responsive avec design moderne.</p>
          <div class="project-tech-list">
            <span class="project-tech">HTML5</span>
            <span class="project-tech">CSS3</span>
            <span class="project-tech">JavaScript</span>
            <span class="project-tech">PHP</span>
            <span class="project-tech">MySQL</span>
          </div>
        </div>
      </div>

      <!-- Project 2 -->
      <div class="project-card reveal reveal-delay-1">
        <div class="project-preview">
          <div class="project-preview-bg" style="background: linear-gradient(135deg, #0d2137, #0d3b5e, #1a6b5e);">
            <i class="fas fa-tasks project-preview-icon" style="color:var(--teal)"></i>
            <div class="project-preview-deco"></div>
          </div>
          <div class="project-overlay">
            <a href="#" class="project-overlay-btn"><i class="fas fa-eye"></i></a>
            <a href="#" class="project-overlay-btn"><i class="fab fa-github"></i></a>
          </div>
        </div>
        <div class="project-info">
          <div class="project-category">Application Web</div>
          <h3 class="project-title">Task Manager — Dashboard</h3>
          <p class="project-desc">Dashboard de gestion de tâches avec drag & drop, statistiques animées, filtres avancés et mode sombre/clair. CRUD complet avec PHP.</p>
          <div class="project-tech-list">
            <span class="project-tech">JavaScript</span>
            <span class="project-tech">PHP</span>
            <span class="project-tech">CSS Grid</span>
          </div>
        </div>
      </div>

      <!-- Project 3 -->
      <div class="project-card reveal reveal-delay-2">
        <div class="project-preview">
          <div class="project-preview-bg" style="background: linear-gradient(135deg, #2d1b69, #3d2b8a, #6c3e9e);">
            <i class="fas fa-palette project-preview-icon" style="color:var(--pink)"></i>
            <div class="project-preview-deco"></div>
          </div>
          <div class="project-overlay">
            <a href="#" class="project-overlay-btn"><i class="fas fa-eye"></i></a>
            <a href="#" class="project-overlay-btn"><i class="fab fa-github"></i></a>
          </div>
        </div>
        <div class="project-info">
          <div class="project-category">Landing Page</div>
          <h3 class="project-title">Portfolio Créatif — Agence</h3>
          <p class="project-desc">Landing page premium pour agence digitale avec animations parallax, galerie interactive et formulaire de contact.</p>
          <div class="project-tech-list">
            <span class="project-tech">HTML5</span>
            <span class="project-tech">CSS3</span>
            <span class="project-tech">JS Vanilla</span>
          </div>
        </div>
      </div>

      <!-- Project 4 -->
      <div class="project-card reveal reveal-delay-3">
        <div class="project-preview">
          <div class="project-preview-bg" style="background: linear-gradient(135deg, #1a2f1a, #1e4a1e, #2d6e3e);">
            <i class="fas fa-utensils project-preview-icon" style="color:var(--teal)"></i>
            <div class="project-preview-deco"></div>
          </div>
          <div class="project-overlay">
            <a href="#" class="project-overlay-btn"><i class="fas fa-eye"></i></a>
            <a href="#" class="project-overlay-btn"><i class="fab fa-github"></i></a>
          </div>
        </div>
        <div class="project-info">
          <div class="project-category">Site Vitrine</div>
          <h3 class="project-title">Restaurant Authentique — Site Web</h3>
          <p class="project-desc">Site vitrine pour restaurant avec menu interactif, réservation en ligne et galerie photos. Design épuré et appétissant.</p>
          <div class="project-tech-list">
            <span class="project-tech">HTML5</span>
            <span class="project-tech">CSS3</span>
            <span class="project-tech">PHP</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<div class="glow-divider"></div>

<!-- ============================================================
     PARCOURS / TIMELINE
============================================================ -->
<section id="parcours" class="section">
  <div class="container">
    <div class="section-label reveal">Formation & expérience</div>
    <h2 class="section-title reveal reveal-delay-1">Mon <span>parcours</span></h2>
    <br>

    <div class="parcours-layout">

      <!-- Timeline -->
      <div>
        <h3 style="font-family:'Syne',sans-serif; font-size:1.1rem; font-weight:700; margin-bottom:32px; color:var(--text-2); display:flex; align-items:center; gap:10px;">
          <i class="fas fa-graduation-cap" style="color:var(--accent-2)"></i> Formation
        </h3>
        <div class="timeline">

          <div class="timeline-item reveal">
            <div class="timeline-date">2023 — 2025</div>
            <div class="timeline-title">Technicien Spécialisé — Développement Digital</div>
            <div class="timeline-org">Institut de Formation Professionnelle · Maroc</div>
            <div class="timeline-desc">Formation intensive couvrant HTML, CSS, JavaScript, PHP, bases de données MySQL, conception UI/UX, développement d'applications web dynamiques et responsive design.</div>
          </div>

          <div class="timeline-item reveal reveal-delay-1">
            <div class="timeline-date">2022 — 2023</div>
            <div class="timeline-title">Baccalauréat Sciences Économiques</div>
            <div class="timeline-org">Lycée · Maroc</div>
            <div class="timeline-desc">Obtention du baccalauréat avec mention. Première initiation au monde du numérique et de la programmation en autodidacte.</div>
          </div>

          <div class="timeline-item reveal reveal-delay-2">
            <div class="timeline-date">2021 — Maintenant</div>
            <div class="timeline-title">Autodidacte & Veille Technologique</div>
            <div class="timeline-org">Online — Udemy, YouTube, MDN, freeCodeCamp</div>
            <div class="timeline-desc">Apprentissage continu via des ressources en ligne : tutoriels, projets personnels, documentation officielle et participation à des défis de codage.</div>
          </div>

        </div>

        <h3 style="font-family:'Syne',sans-serif; font-size:1.1rem; font-weight:700; margin-bottom:32px; color:var(--text-2); display:flex; align-items:center; gap:10px;">
          <i class="fas fa-briefcase" style="color:var(--accent-2)"></i> Expérience
        </h3>
        <div class="timeline">

          <div class="timeline-item reveal">
            <div class="timeline-date">2024 — 2025</div>
            <div class="timeline-title">Stagiaire — Développement Digital</div>
            <div class="timeline-org">Entreprise Partenaire · Maroc</div>
            <div class="timeline-desc">Participation à des projets web concrets. Développement de fonctionnalités front-end, collaboration en équipe, code review et déploiement de sites web clients.</div>
          </div>

        </div>
      </div>

      <!-- Certifications -->
      <div class="reveal reveal-right">
        <h3 style="font-family:'Syne',sans-serif; font-size:1.1rem; font-weight:700; margin-bottom:32px; color:var(--text-2); display:flex; align-items:center; gap:10px;">
          <i class="fas fa-certificate" style="color:var(--accent-2)"></i> Certifications & Badges
        </h3>
        <div class="certif-grid">

          <div class="certif-card">
            <div class="certif-icon" style="background:rgba(227,76,38,0.12); color:#e34c26;">
              <i class="fab fa-html5"></i>
            </div>
            <div class="certif-info">
              <h4>HTML & CSS Certification</h4>
              <p>freeCodeCamp · 2023</p>
            </div>
          </div>

          <div class="certif-card">
            <div class="certif-icon" style="background:rgba(240,219,79,0.12); color:#f0db4f;">
              <i class="fab fa-js"></i>
            </div>
            <div class="certif-info">
              <h4>JavaScript Fundamentals</h4>
              <p>Udemy · 2024</p>
            </div>
          </div>

          <div class="certif-card">
            <div class="certif-icon" style="background:rgba(136,146,191,0.12); color:#8892bf;">
              <i class="fab fa-php"></i>
            </div>
            <div class="certif-info">
              <h4>PHP & MySQL Developer</h4>
              <p>Formation Officielle · 2024</p>
            </div>
          </div>

          <div class="certif-card">
            <div class="certif-icon" style="background:rgba(253,121,168,0.12); color:#fd79a8;">
              <i class="fas fa-paint-brush"></i>
            </div>
            <div class="certif-info">
              <h4>UI/UX Design Essentials</h4>
              <p>Google Digital Garage · 2024</p>
            </div>
          </div>

          <div class="certif-card">
            <div class="certif-icon" style="background:rgba(0,206,201,0.12); color:#00cec9;">
              <i class="fas fa-mobile-alt"></i>
            </div>
            <div class="certif-info">
              <h4>Responsive Web Design</h4>
              <p>freeCodeCamp · 2023</p>
            </div>
          </div>

          <div class="certif-card">
            <div class="certif-icon" style="background:rgba(108,92,231,0.12); color:var(--accent-2);">
              <i class="fas fa-code"></i>
            </div>
            <div class="certif-info">
              <h4>Développement Fullstack Web</h4>
              <p>OFPPT Maroc · 2025</p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<div class="glow-divider"></div>

<!-- ============================================================
     GALERIE / MARQUEE
============================================================ -->
<section id="galerie" class="section" style="padding-bottom:80px;">
  <div class="container">
    <div class="section-label reveal">Univers créatif</div>
    <h2 class="section-title reveal reveal-delay-1">Technologies & <span>inspirations</span></h2>
  </div>

  <div class="galerie-marquee-wrap">
    <div class="marquee-track">
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a0a00,#3d1500);">
        <i class="fab fa-html5" style="color:#e34c26"></i>
        <span class="marquee-card-label">HTML5</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#000d3d,#001566);">
        <i class="fab fa-css3-alt" style="color:#2965f1"></i>
        <span class="marquee-card-label">CSS3</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a1700,#3d3500);">
        <i class="fab fa-js" style="color:#f0db4f"></i>
        <span class="marquee-card-label">JavaScript</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#0d0d24,#1a1a40);">
        <i class="fab fa-php" style="color:#8892bf"></i>
        <span class="marquee-card-label">PHP</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a0020,#380040);">
        <i class="fas fa-paint-brush" style="color:#fd79a8"></i>
        <span class="marquee-card-label">UI/UX Design</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#001a1a,#003535);">
        <i class="fas fa-database" style="color:#00cec9"></i>
        <span class="marquee-card-label">MySQL</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#0a0014,#1a0030);">
        <i class="fab fa-git-alt" style="color:#f34f29"></i>
        <span class="marquee-card-label">Git</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#0a1a00,#1a3800);">
        <i class="fas fa-mobile-alt" style="color:#00b09b"></i>
        <span class="marquee-card-label">Responsive</span>
      </div>
      <!-- Duplicate for seamless loop -->
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a0a00,#3d1500);">
        <i class="fab fa-html5" style="color:#e34c26"></i>
        <span class="marquee-card-label">HTML5</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#000d3d,#001566);">
        <i class="fab fa-css3-alt" style="color:#2965f1"></i>
        <span class="marquee-card-label">CSS3</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a1700,#3d3500);">
        <i class="fab fa-js" style="color:#f0db4f"></i>
        <span class="marquee-card-label">JavaScript</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#0d0d24,#1a1a40);">
        <i class="fab fa-php" style="color:#8892bf"></i>
        <span class="marquee-card-label">PHP</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a0020,#380040);">
        <i class="fas fa-paint-brush" style="color:#fd79a8"></i>
        <span class="marquee-card-label">UI/UX Design</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#001a1a,#003535);">
        <i class="fas fa-database" style="color:#00cec9"></i>
        <span class="marquee-card-label">MySQL</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#0a0014,#1a0030);">
        <i class="fab fa-git-alt" style="color:#f34f29"></i>
        <span class="marquee-card-label">Git</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#0a1a00,#1a3800);">
        <i class="fas fa-mobile-alt" style="color:#00b09b"></i>
        <span class="marquee-card-label">Responsive</span>
      </div>
    </div>

    <div class="marquee-track marquee-track-reverse">
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a0010,#3d0030);">
        <i class="fas fa-magic" style="color:var(--accent-2)"></i>
        <span class="marquee-card-label">Animations</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#001420,#002a45);">
        <i class="fas fa-rocket" style="color:var(--teal)"></i>
        <span class="marquee-card-label">Performance</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a1000,#402800);">
        <i class="fas fa-search" style="color:var(--gold)"></i>
        <span class="marquee-card-label">SEO</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#001a10,#003820);">
        <i class="fas fa-shield-alt" style="color:#55efc4"></i>
        <span class="marquee-card-label">Sécurité</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a001a,#380038);">
        <i class="fas fa-layer-group" style="color:var(--pink)"></i>
        <span class="marquee-card-label">Glassmorphism</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#000a1a,#001840);">
        <i class="fas fa-users" style="color:#74b9ff"></i>
        <span class="marquee-card-label">Travail d'équipe</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a0000,#3d0000);">
        <i class="fas fa-heart" style="color:var(--pink)"></i>
        <span class="marquee-card-label">Passion</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#001010,#002828);">
        <i class="fas fa-terminal" style="color:#00cec9"></i>
        <span class="marquee-card-label">Clean Code</span>
      </div>
      <!-- Duplicate -->
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a0010,#3d0030);">
        <i class="fas fa-magic" style="color:var(--accent-2)"></i>
        <span class="marquee-card-label">Animations</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#001420,#002a45);">
        <i class="fas fa-rocket" style="color:var(--teal)"></i>
        <span class="marquee-card-label">Performance</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a1000,#402800);">
        <i class="fas fa-search" style="color:var(--gold)"></i>
        <span class="marquee-card-label">SEO</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#001a10,#003820);">
        <i class="fas fa-shield-alt" style="color:#55efc4"></i>
        <span class="marquee-card-label">Sécurité</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a001a,#380038);">
        <i class="fas fa-layer-group" style="color:var(--pink)"></i>
        <span class="marquee-card-label">Glassmorphism</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#000a1a,#001840);">
        <i class="fas fa-users" style="color:#74b9ff"></i>
        <span class="marquee-card-label">Travail d'équipe</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#1a0000,#3d0000);">
        <i class="fas fa-heart" style="color:var(--pink)"></i>
        <span class="marquee-card-label">Passion</span>
      </div>
      <div class="marquee-card" style="background:linear-gradient(135deg,#001010,#002828);">
        <i class="fas fa-terminal" style="color:#00cec9"></i>
        <span class="marquee-card-label">Clean Code</span>
      </div>
    </div>
  </div>
</section>

<div class="glow-divider"></div>

<!-- ============================================================
     TESTIMONIALS
============================================================ -->
<section id="testimonials" class="section">
  <div class="container">
    <div class="section-label reveal">Témoignages</div>
    <h2 class="section-title reveal reveal-delay-1">Ce qu'on dit <span>de moi</span></h2>

    <div class="testimonials-grid">

      <div class="testimonial-card reveal">
        <div class="testimonial-quote">"</div>
        <p class="testimonial-text">Zakaria a fait preuve d'une grande motivation et d'une capacité d'apprentissage remarquable. Son code est propre, bien structuré et ses interfaces sont toujours soignées. Un vrai atout pour notre équipe.</p>
        <div class="testimonial-author">
          <div class="author-avatar">MR</div>
          <div>
            <div class="author-name">Mohammed Rachidi</div>
            <div class="author-role">Responsable Technique · Agence Digitale</div>
            <div class="stars">★★★★★</div>
          </div>
        </div>
      </div>

      <div class="testimonial-card reveal reveal-delay-2">
        <div class="testimonial-quote">"</div>
        <p class="testimonial-text">J'ai eu la chance de travailler avec Zakaria sur un projet e-commerce. Il a livré un travail de qualité professionnelle en respectant les délais. Sa créativité et son sens du détail sont impressionnants pour son âge.</p>
        <div class="testimonial-author">
          <div class="author-avatar" style="background:linear-gradient(135deg,var(--teal),var(--accent))">SB</div>
          <div>
            <div class="author-name">Sara Benmoussa</div>
            <div class="author-role">Chef de Projet · Start-Up Tech</div>
            <div class="stars">★★★★★</div>
          </div>
        </div>
      </div>

      <div class="testimonial-card reveal reveal-delay-3">
        <div class="testimonial-quote">"</div>
        <p class="testimonial-text">Un jeune développeur très sérieux, toujours à l'écoute et prêt à s'améliorer. Ses animations CSS sont vraiment bluffantes et il a une excellente compréhension des besoins utilisateurs.</p>
        <div class="testimonial-author">
          <div class="author-avatar" style="background:linear-gradient(135deg,var(--pink),var(--accent))">KA</div>
          <div>
            <div class="author-name">Karim Alaoui</div>
            <div class="author-role">Formateur Web · OFPPT</div>
            <div class="stars">★★★★★</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<div class="glow-divider"></div>

<!-- ============================================================
     CONTACT SECTION
============================================================ -->
<section id="contact" class="section">
  <div class="container">
    <div class="section-label reveal">Contact</div>
    <h2 class="section-title reveal reveal-delay-1">Travaillons <span>ensemble</span></h2>

    <div class="contact-layout" style="margin-top:64px;">

      <!-- Info -->
      <div class="reveal reveal-left">
        <h3 class="contact-info h3">Prêt à collaborer ?</h3>
        <p style="color:var(--text-2); margin:16px 0 48px; font-size:1rem;">Je suis disponible pour des stages, des projets freelance et des opportunités professionnelles. N'hésitez pas à me contacter !</p>

        <div class="contact-items">
          <div class="contact-item">
            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
            <div class="contact-item-text">
              <strong>Email</strong>
              <span>zakaria.benjrada@email.com</span>
            </div>
          </div>
          <div class="contact-item">
            <div class="contact-icon"><i class="fas fa-phone"></i></div>
            <div class="contact-item-text">
              <strong>Téléphone</strong>
              <span>+212 6XX XX XX XX</span>
            </div>
          </div>
          <div class="contact-item">
            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
            <div class="contact-item-text">
              <strong>Localisation</strong>
              <span>Maroc — Disponible à distance</span>
            </div>
          </div>
          <div class="contact-item">
            <div class="contact-icon"><i class="fas fa-clock"></i></div>
            <div class="contact-item-text">
              <strong>Disponibilité</strong>
              <span>Immédiate · Temps plein</span>
            </div>
          </div>
        </div>

        <div class="social-links">
          <a href="#" class="social-btn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="social-btn" title="GitHub"><i class="fab fa-github"></i></a>
          <a href="#" class="social-btn" title="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-btn" title="Twitter"><i class="fab fa-twitter"></i></a>
        </div>
      </div>

      <!-- Form -->
      <div class="reveal reveal-right">
        <div class="contact-form">
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Prénom</label>
              <input type="text" class="form-control" placeholder="Jean" />
            </div>
            <div class="form-group">
              <label class="form-label">Nom</label>
              <input type="text" class="form-control" placeholder="Dupont" />
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="contact@exemple.com" />
          </div>
          <div class="form-group">
            <label class="form-label">Sujet</label>
            <input type="text" class="form-control" placeholder="Proposition de stage / Projet freelance" />
          </div>
          <div class="form-group">
            <label class="form-label">Message</label>
            <textarea class="form-control" placeholder="Bonjour Zakaria, je souhaite..."></textarea>
          </div>
          <button class="form-submit" onclick="handleFormSubmit(this)">
            Envoyer le message <i class="fas fa-paper-plane"></i>
          </button>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     FOOTER
============================================================ -->
<footer>
  <div class="container">
    <div class="footer-inner">
      <div>
        <div class="nav-logo" style="font-size:1.6rem;">ZB.</div>
        <p class="footer-brand-text">Développeur digital passionné, créatif et toujours en apprentissage. Je transforme vos idées en expériences numériques mémorables.</p>
        <div class="social-links">
          <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="social-btn"><i class="fab fa-github"></i></a>
          <a href="#" class="social-btn"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div>
        <div class="footer-title">Navigation</div>
        <div class="footer-links">
          <a href="#about">À propos</a>
          <a href="#skills">Compétences</a>
          <a href="#services">Services</a>
          <a href="#projects">Projets</a>
          <a href="#parcours">Parcours</a>
          <a href="#contact">Contact</a>
        </div>
      </div>
      <div>
        <div class="footer-title">Services</div>
        <div class="footer-links">
          <a href="#services">Développement Web</a>
          <a href="#services">Design UI/UX</a>
          <a href="#services">Responsive Design</a>
          <a href="#services">PHP & MySQL</a>
          <a href="#services">Animations</a>
        </div>
      </div>
      <div>
        <div class="footer-title">Technologies</div>
        <div class="footer-links">
          <a href="#skills">HTML5</a>
          <a href="#skills">CSS3</a>
          <a href="#skills">JavaScript</a>
          <a href="#skills">PHP</a>
          <a href="#skills">MySQL</a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p class="footer-copy">
        © 2025 <span>Zakaria Benjrada</span>. Tous droits réservés.
      </p>
      <p class="footer-made">
        Fait avec <i class="fas fa-heart"></i> et beaucoup de café
      </p>
    </div>
  </div>
</footer>

<!-- ============================================================
     JAVASCRIPT
============================================================ -->
<script>
/* ============================================================
   CUSTOM CURSOR
============================================================ */
const cursorDot = document.getElementById('cursor-dot');
const cursorRing = document.getElementById('cursor-ring');
let mouseX = 0, mouseY = 0;
let ringX = 0, ringY = 0;

document.addEventListener('mousemove', e => {
  mouseX = e.clientX;
  mouseY = e.clientY;
  cursorDot.style.left = mouseX + 'px';
  cursorDot.style.top  = mouseY + 'px';
});

function animateCursor() {
  ringX += (mouseX - ringX) * 0.12;
  ringY += (mouseY - ringY) * 0.12;
  cursorRing.style.left = ringX + 'px';
  cursorRing.style.top  = ringY + 'px';
  requestAnimationFrame(animateCursor);
}
animateCursor();

/* ============================================================
   NAVBAR SCROLL
============================================================ */
const navbar = document.getElementById('navbar');
const progressBar = document.getElementById('progress-bar');

window.addEventListener('scroll', () => {
  const scrolled = window.scrollY;
  const docH = document.body.scrollHeight - window.innerHeight;
  const pct = (scrolled / docH) * 100;

  progressBar.style.width = pct + '%';
  navbar.classList.toggle('scrolled', scrolled > 60);
});

/* ============================================================
   HAMBURGER / MOBILE NAV
============================================================ */
const hamburger = document.getElementById('hamburger');
const mobileNav = document.getElementById('mobileNav');

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('active');
  mobileNav.classList.toggle('open');
  document.body.style.overflow = mobileNav.classList.contains('open') ? 'hidden' : '';
});

function closeMobileNav() {
  hamburger.classList.remove('active');
  mobileNav.classList.remove('open');
  document.body.style.overflow = '';
}

/* ============================================================
   THEME TOGGLE
============================================================ */
const themeToggle = document.getElementById('themeToggle');
const themeIcon   = document.getElementById('themeIcon');
let isDark = true;

themeToggle.addEventListener('click', () => {
  isDark = !isDark;
  document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
  themeIcon.className = isDark ? 'fas fa-moon' : 'fas fa-sun';
});

/* ============================================================
   TYPED TEXT EFFECT
============================================================ */
const phrases = [
  'Développeur Digital',
  'UI/UX Designer',
  'Créateur d\'Expériences',
  'Passionné du Code',
  'Front-End Developer',
];
let phraseIdx = 0, charIdx = 0, isDeleting = false;
const typedEl = document.getElementById('typedText');

function type() {
  const phrase = phrases[phraseIdx];
  const displayed = isDeleting
    ? phrase.substring(0, charIdx--)
    : phrase.substring(0, charIdx++);

  typedEl.textContent = displayed;

  let speed = isDeleting ? 50 : 90;

  if (!isDeleting && charIdx > phrase.length) {
    speed = 1800;
    isDeleting = true;
  } else if (isDeleting && charIdx < 0) {
    isDeleting = false;
    phraseIdx = (phraseIdx + 1) % phrases.length;
    speed = 400;
  }
  setTimeout(type, speed);
}
type();

/* ============================================================
   SCROLL REVEAL
============================================================ */
const reveals = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.classList.add('visible');
      // Trigger skill bars & counters
      if (e.target.querySelector) {
        e.target.querySelectorAll('.skill-bar-fill').forEach(bar => {
          bar.style.width = bar.dataset.width + '%';
        });
      }
    }
  });
}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

reveals.forEach(r => observer.observe(r));

/* ============================================================
   ANIMATED COUNTERS
============================================================ */
const counterObserver = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting && !e.target.dataset.counted) {
      e.target.dataset.counted = true;
      const target = +e.target.dataset.target;
      let current = 0;
      const step = target / 60;
      const interval = setInterval(() => {
        current = Math.min(current + step, target);
        e.target.textContent = Math.ceil(current);
        if (current >= target) clearInterval(interval);
      }, 25);
    }
  });
}, { threshold: 0.5 });

document.querySelectorAll('.counter').forEach(c => counterObserver.observe(c));

/* ============================================================
   SKILL BARS — triggered by IntersectionObserver
============================================================ */
const skillObserver = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.querySelectorAll('.skill-bar-fill').forEach(bar => {
        setTimeout(() => { bar.style.width = bar.dataset.width + '%'; }, 200);
      });
    }
  });
}, { threshold: 0.3 });

document.querySelectorAll('.skill-card').forEach(c => skillObserver.observe(c));

/* ============================================================
   PARTICLES CANVAS
============================================================ */
const canvas = document.getElementById('particles-canvas');
const ctx    = canvas.getContext('2d');
let particles = [];

function resizeCanvas() {
  canvas.width  = window.innerWidth;
  canvas.height = window.innerHeight;
}
resizeCanvas();
window.addEventListener('resize', resizeCanvas);

class Particle {
  constructor() { this.reset(); }
  reset() {
    this.x  = Math.random() * canvas.width;
    this.y  = Math.random() * canvas.height;
    this.r  = Math.random() * 1.5 + 0.3;
    this.vx = (Math.random() - 0.5) * 0.3;
    this.vy = (Math.random() - 0.5) * 0.3;
    this.opacity = Math.random() * 0.5 + 0.1;
    const colors = ['#6c5ce7','#00cec9','#fd79a8','#a29bfe'];
    this.color = colors[Math.floor(Math.random()*colors.length)];
  }
  update() {
    this.x += this.vx;
    this.y += this.vy;
    if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) this.reset();
  }
  draw() {
    ctx.save();
    ctx.globalAlpha = this.opacity;
    ctx.fillStyle   = this.color;
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.r, 0, Math.PI*2);
    ctx.fill();
    ctx.restore();
  }
}

for (let i = 0; i < 100; i++) particles.push(new Particle());

function animateParticles() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  particles.forEach(p => { p.update(); p.draw(); });
  requestAnimationFrame(animateParticles);
}
animateParticles();

/* ============================================================
   PARALLAX on hero blobs
============================================================ */
document.addEventListener('mousemove', e => {
  const x = (e.clientX / window.innerWidth - 0.5) * 20;
  const y = (e.clientY / window.innerHeight - 0.5) * 20;
  document.querySelector('.hero-blob-1').style.transform = `translate(${x}px, ${y}px)`;
  document.querySelector('.hero-blob-2').style.transform = `translate(${-x * 0.7}px, ${-y * 0.7}px)`;
});

/* ============================================================
   FORM SUBMIT
============================================================ */
function handleFormSubmit(btn) {
  const orig = btn.innerHTML;
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
  btn.disabled = true;
  setTimeout(() => {
    btn.innerHTML = '<i class="fas fa-check"></i> Message envoyé !';
    btn.style.background = 'linear-gradient(135deg, #00b09b, #00cec9)';
    setTimeout(() => {
      btn.innerHTML = orig;
      btn.style.background = '';
      btn.disabled = false;
    }, 3000);
  }, 2000);
}

/* ============================================================
   SMOOTH ANCHOR SCROLL
============================================================ */
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const target = document.querySelector(a.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});
</script>
</body>
</html>
