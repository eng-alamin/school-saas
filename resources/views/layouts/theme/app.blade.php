<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>School One & College – Home</title>

  <!-- Bootstrap 5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <style>
    :root {
      --primary:   #2563eb;
      --primary-d: #1d4ed8;
      --accent:    #f59e0b;
      --dark:      #0f172a;
      --mid:       #334155;
      --light:     #f1f5f9;
      --white:     #ffffff;
      --font-head: 'Playfair Display', Georgia, serif;
      --font-body: 'DM Sans', sans-serif;
      --radius:    12px;
      --shadow:    0 8px 32px rgba(15,23,42,.10);
      --transition: .35s cubic-bezier(.4,0,.2,1);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body { font-family: var(--font-body); color: var(--mid); background: var(--white); overflow-x: hidden; }
    h1,h2,h3,h4,h5,h6 { font-family: var(--font-head); color: var(--dark); }
    a { text-decoration: none; }
    img { max-width: 100%; }

    /* ─── TOPBAR ─────────────────────────────────────────────────────────── */
    .topbar {
      background: var(--dark);
      color: #94a3b8;
      font-size: .82rem;
      padding: .45rem 0;
    }
    .topbar a { color: #94a3b8; transition: color var(--transition); }
    .topbar a:hover { color: var(--accent); }
    .topbar .divider { color: #334155; margin: 0 .6rem; }

    /* ─── NAVBAR ─────────────────────────────────────────────────────────── */
    .navbar {
      background: var(--white);
      box-shadow: 0 2px 20px rgba(15,23,42,.08);
      padding: .85rem 0;
      position: sticky;
      top: 0;
      z-index: 1030;
      transition: box-shadow var(--transition);
    }
    .navbar-brand img { height: 46px; }
    .navbar-brand span {
      font-family: var(--font-head);
      font-size: 1.35rem;
      font-weight: 700;
      color: var(--dark);
      letter-spacing: -.3px;
    }
    .navbar .nav-link {
      font-size: .9rem;
      font-weight: 500;
      color: var(--mid);
      padding: .5rem .85rem !important;
      border-radius: 6px;
      transition: background var(--transition), color var(--transition);
      position: relative;
    }
    .navbar .nav-link::after {
      content: '';
      position: absolute;
      bottom: 4px; left: 50%;
      width: 0; height: 2px;
      background: var(--primary);
      border-radius: 2px;
      transition: width var(--transition), left var(--transition);
    }
    .navbar .nav-link:hover::after,
    .navbar .nav-link.active::after { width: 60%; left: 20%; }
    .navbar .nav-link:hover,
    .navbar .nav-link.active { color: var(--primary); background: #eff6ff; }
    .navbar .dropdown-menu {
      border: none;
      box-shadow: var(--shadow);
      border-radius: var(--radius);
      padding: .5rem;
      min-width: 200px;
    }
    .navbar .dropdown-item {
      border-radius: 8px;
      font-size: .88rem;
      font-weight: 500;
      padding: .55rem 1rem;
      color: var(--mid);
      transition: background var(--transition), color var(--transition);
    }
    .navbar .dropdown-item:hover { background: #eff6ff; color: var(--primary); }
    .btn-login {
      background: var(--primary);
      color: var(--white) !important;
      border-radius: 8px !important;
      padding: .45rem 1.2rem !important;
      font-weight: 600 !important;
      font-size: .88rem !important;
      transition: background var(--transition), transform var(--transition), box-shadow var(--transition) !important;
    }
    .btn-login::after { display: none !important; }
    .btn-login:hover {
      background: var(--primary-d) !important;
      color: var(--white) !important;
      transform: translateY(-1px);
      box-shadow: 0 4px 16px rgba(37,99,235,.35) !important;
    }

    /* ─── HERO ───────────────────────────────────────────────────────────── */
    .hero {
      min-height: 88vh;
      background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 55%, #1d4ed8 100%);
      position: relative;
      overflow: hidden;
      display: flex;
      align-items: center;
    }
    .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(ellipse 70% 60% at 80% 50%, rgba(251,191,36,.10) 0%, transparent 70%),
        url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    /* floating shapes */
    .hero-shape {
      position: absolute;
      border-radius: 50%;
      opacity: .08;
      animation: floatShape 8s ease-in-out infinite alternate;
    }
    .hero-shape.s1 { width:420px; height:420px; background:var(--accent); top:-80px; right:-60px; animation-delay:0s; }
    .hero-shape.s2 { width:200px; height:200px; background:#60a5fa; bottom:60px; left:5%; animation-delay:2s; }
    .hero-shape.s3 { width:120px; height:120px; background:#34d399; bottom:200px; right:15%; animation-delay:4s; }
    @keyframes floatShape {
      from { transform: translate(0,0) scale(1); }
      to   { transform: translate(20px,-30px) scale(1.08); }
    }

    .hero-badge {
      display: inline-flex; align-items: center; gap: .5rem;
      background: rgba(251,191,36,.15);
      border: 1px solid rgba(251,191,36,.30);
      color: var(--accent);
      font-size: .8rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase;
      padding: .4rem 1rem; border-radius: 99px;
      margin-bottom: 1.5rem;
      backdrop-filter: blur(6px);
    }
    .hero h1 {
      font-size: clamp(2.4rem, 5vw, 4rem);
      color: var(--white);
      line-height: 1.15;
      margin-bottom: 1.25rem;
    }
    .hero h1 span { color: var(--accent); }
    .hero p {
      font-size: 1.1rem;
      color: #cbd5e1;
      line-height: 1.75;
      max-width: 520px;
      margin-bottom: 2rem;
    }
    .hero-btns { display: flex; gap: 1rem; flex-wrap: wrap; }
    .btn-hero-primary {
      background: var(--accent);
      color: var(--dark);
      font-weight: 700;
      border-radius: 10px;
      padding: .8rem 2rem;
      font-size: .95rem;
      transition: transform var(--transition), box-shadow var(--transition);
      border: none;
    }
    .btn-hero-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(245,158,11,.4); color: var(--dark); }
    .btn-hero-outline {
      background: transparent;
      color: var(--white);
      border: 2px solid rgba(255,255,255,.35);
      font-weight: 600;
      border-radius: 10px;
      padding: .8rem 2rem;
      font-size: .95rem;
      transition: background var(--transition), border-color var(--transition);
    }
    .btn-hero-outline:hover { background: rgba(255,255,255,.10); border-color: rgba(255,255,255,.6); color: var(--white); }

    /* hero stats */
    .hero-stats {
      display: flex; gap: 2rem; flex-wrap: wrap;
      margin-top: 3rem; padding-top: 2rem;
      border-top: 1px solid rgba(255,255,255,.12);
    }
    .hero-stat-num { font-family: var(--font-head); font-size: 2rem; font-weight: 800; color: var(--white); }
    .hero-stat-lbl { font-size: .82rem; color: #94a3b8; margin-top: .1rem; }

    /* hero image card */
    .hero-img-wrap {
      position: relative;
      display: flex; justify-content: center; align-items: center;
    }
    .hero-main-img {
      width: 100%;
      max-width: 460px;
      border-radius: 24px;
      box-shadow: 0 32px 80px rgba(0,0,0,.4);
      object-fit: cover;
      aspect-ratio: 4/3;
      background: linear-gradient(135deg,#1e3a8a,#3b82f6);
      display: flex; align-items: center; justify-content: center;
    }
    .hero-float-card {
      position: absolute;
      background: var(--white);
      border-radius: 14px;
      padding: .9rem 1.2rem;
      box-shadow: 0 12px 40px rgba(0,0,0,.2);
      display: flex; align-items: center; gap: .8rem;
      animation: floatCard 4s ease-in-out infinite alternate;
    }
    @keyframes floatCard { from { transform: translateY(0); } to { transform: translateY(-10px); } }
    .hero-float-card.c1 { bottom: 30px; left: -20px; }
    .hero-float-card.c2 { top: 30px; right: -20px; animation-delay: 2s; }
    .hero-float-card .fc-icon {
      width: 44px; height: 44px; border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.3rem;
    }
    .hero-float-card .fc-text .num { font-family: var(--font-head); font-size: 1.3rem; font-weight: 700; color: var(--dark); line-height:1; }
    .hero-float-card .fc-text .lbl { font-size: .75rem; color: #64748b; }

    /* ─── NEWS TICKER ─────────────────────────────────────────────────────── */
    .news-ticker {
      background: var(--primary);
      color: var(--white);
      padding: .55rem 0;
      overflow: hidden;
    }
    .news-ticker .label {
      background: var(--accent);
      color: var(--dark);
      font-weight: 700;
      font-size: .78rem;
      text-transform: uppercase;
      letter-spacing: .06em;
      padding: .2rem .9rem;
      border-radius: 4px;
      white-space: nowrap;
      flex-shrink: 0;
    }
    .ticker-wrap { overflow: hidden; flex: 1; }
    .ticker-items {
      display: flex; gap: 3rem; width: max-content;
      animation: ticker 28s linear infinite;
    }
    .ticker-items a { color: var(--white); font-size: .85rem; white-space: nowrap; }
    .ticker-items a:hover { color: var(--accent); }
    @keyframes ticker { from { transform: translateX(0); } to { transform: translateX(-50%); } }

    /* ─── SECTION COMMONS ─────────────────────────────────────────────────── */
    section { padding: 5rem 0; }
    .section-tag {
      display: inline-block;
      font-size: .78rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em;
      color: var(--primary);
      background: #eff6ff;
      border-radius: 99px;
      padding: .3rem .9rem;
      margin-bottom: .75rem;
    }
    .section-title { font-size: clamp(1.75rem, 3vw, 2.5rem); line-height: 1.2; margin-bottom: 1rem; }
    .section-sub { color: #64748b; font-size: 1rem; line-height: 1.75; max-width: 560px; }
    .divider-line {
      width: 48px; height: 4px; border-radius: 2px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      margin-bottom: 1.25rem;
    }

    /* ─── FEATURE CARDS ───────────────────────────────────────────────────── */
    .feat-section { background: var(--light); }
    .feat-card {
      background: var(--white);
      border-radius: var(--radius);
      padding: 2rem 1.75rem;
      height: 100%;
      box-shadow: 0 2px 16px rgba(15,23,42,.06);
      transition: transform var(--transition), box-shadow var(--transition);
      border: 1px solid transparent;
      position: relative;
      overflow: hidden;
    }
    .feat-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; height: 3px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      transform: scaleX(0);
      transition: transform var(--transition);
    }
    .feat-card:hover { transform: translateY(-6px); box-shadow: var(--shadow); }
    .feat-card:hover::before { transform: scaleX(1); }
    .feat-icon {
      width: 56px; height: 56px; border-radius: 14px;
      background: #eff6ff;
      color: var(--primary);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.5rem;
      margin-bottom: 1.25rem;
      transition: background var(--transition), color var(--transition);
    }
    .feat-card:hover .feat-icon { background: var(--primary); color: var(--white); }
    .feat-card h5 { font-size: 1.1rem; margin-bottom: .6rem; }
    .feat-card p { font-size: .9rem; color: #64748b; line-height: 1.7; margin: 0; }
    .feat-card a { font-size: .85rem; font-weight: 600; color: var(--primary); margin-top: 1rem; display: inline-flex; align-items: center; gap: .3rem; }
    .feat-card a:hover { gap: .6rem; }

    /* ─── WELCOME SECTION ─────────────────────────────────────────────────── */
    .welcome-img-wrap { position: relative; }
    .welcome-img-wrap img {
      border-radius: 20px;
      box-shadow: var(--shadow);
      width: 100%;
      object-fit: cover;
    }
    .welcome-badge {
      position: absolute;
      bottom: -20px; right: -20px;
      background: var(--primary);
      color: var(--white);
      border-radius: 16px;
      padding: 1.25rem 1.5rem;
      box-shadow: 0 8px 32px rgba(37,99,235,.35);
      text-align: center;
    }
    .welcome-badge .num { font-family: var(--font-head); font-size: 2.2rem; font-weight: 800; line-height:1; }
    .welcome-badge .lbl { font-size: .8rem; opacity: .85; margin-top: .2rem; }
    .check-list { list-style: none; padding: 0; margin: 1.5rem 0; }
    .check-list li {
      display: flex; align-items: flex-start; gap: .75rem;
      font-size: .95rem; color: var(--mid); margin-bottom: .75rem;
    }
    .check-list li i { color: var(--primary); font-size: 1.1rem; margin-top: .1rem; flex-shrink:0; }

    /* ─── TEACHERS ────────────────────────────────────────────────────────── */
    .teachers-section { background: var(--light); }
    .teacher-card {
      background: var(--white);
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: 0 2px 16px rgba(15,23,42,.07);
      transition: transform var(--transition), box-shadow var(--transition);
      text-align: center;
    }
    .teacher-card:hover { transform: translateY(-6px); box-shadow: var(--shadow); }
    .teacher-img-wrap {
      position: relative;
      overflow: hidden;
      height: 220px;
    }
    .teacher-img-wrap img {
      width: 100%; height: 100%; object-fit: cover;
      transition: transform .5s ease;
    }
    .teacher-card:hover .teacher-img-wrap img { transform: scale(1.06); }
    .teacher-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(to top, rgba(15,23,42,.7) 0%, transparent 55%);
    }
    .teacher-socials {
      position: absolute; bottom: 0; left: 0; right: 0;
      display: flex; justify-content: center; gap: .5rem;
      padding: .75rem;
      transform: translateY(100%);
      transition: transform var(--transition);
    }
    .teacher-card:hover .teacher-socials { transform: translateY(0); }
    .teacher-socials a {
      width: 32px; height: 32px; border-radius: 8px;
      background: var(--white);
      color: var(--primary);
      display: flex; align-items: center; justify-content: center;
      font-size: .85rem;
      transition: background var(--transition), color var(--transition);
    }
    .teacher-socials a:hover { background: var(--primary); color: var(--white); }
    .teacher-body { padding: 1.25rem 1rem 1.5rem; }
    .teacher-body h5 { font-size: 1.05rem; margin-bottom: .2rem; }
    .teacher-body span { font-size: .82rem; color: var(--primary); font-weight: 600; background: #eff6ff; border-radius: 99px; padding: .2rem .75rem; }

    /* ─── TESTIMONIALS ────────────────────────────────────────────────────── */
    .testimonial-card {
      background: var(--white);
      border-radius: var(--radius);
      padding: 2rem;
      box-shadow: var(--shadow);
      position: relative;
      border: 1px solid #e2e8f0;
    }
    .testimonial-card::before {
      content: '\201C';
      position: absolute; top: 1rem; right: 1.5rem;
      font-family: var(--font-head); font-size: 5rem;
      color: #e2e8f0; line-height: 1;
    }
    .stars { color: var(--accent); font-size: .9rem; margin-bottom: .75rem; }
    .testimonial-card p { font-size: .93rem; color: var(--mid); line-height: 1.75; font-style: italic; }
    .testimonial-card .author { display: flex; align-items: center; gap: .75rem; margin-top: 1.25rem; }
    .testimonial-card .author img { width: 46px; height: 46px; border-radius: 50%; object-fit: cover; border: 2px solid #e2e8f0; }
    .testimonial-card .author-info strong { display: block; font-size: .9rem; color: var(--dark); }
    .testimonial-card .author-info small { color: #94a3b8; font-size: .78rem; }

    /* ─── STATS ───────────────────────────────────────────────────────────── */
    .stats-section {
      background: linear-gradient(135deg, #0f172a, #1e3a8a);
      position: relative; overflow: hidden;
    }
    .stats-section::before {
      content: '';
      position: absolute; inset: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Ccircle cx='30' cy='30' r='3'/%3E%3C/g%3E%3C/svg%3E");
    }
    .stat-card { text-align: center; padding: 2rem 1rem; }
    .stat-num { font-family: var(--font-head); font-size: 3rem; font-weight: 800; color: var(--white); line-height: 1; }
    .stat-num span { color: var(--accent); }
    .stat-lbl { font-size: .9rem; color: #94a3b8; margin-top: .5rem; font-weight: 500; }
    .stat-icon { font-size: 2rem; color: rgba(255,255,255,.15); margin-bottom: .75rem; }

    /* ─── WHY CHOOSE ──────────────────────────────────────────────────────── */
    .why-item {
      display: flex; align-items: flex-start; gap: 1rem;
      padding: 1rem;
      border-radius: 10px;
      transition: background var(--transition);
      cursor: default;
    }
    .why-item:hover { background: #eff6ff; }
    .why-icon {
      width: 42px; height: 42px; border-radius: 10px;
      background: #eff6ff; color: var(--primary);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.15rem; flex-shrink: 0;
      transition: background var(--transition), color var(--transition);
    }
    .why-item:hover .why-icon { background: var(--primary); color: var(--white); }
    .why-item h6 { font-size: .95rem; margin-bottom: .2rem; }
    .why-item p { font-size: .85rem; color: #64748b; margin: 0; line-height: 1.6; }

    /* ─── CTA ─────────────────────────────────────────────────────────────── */
    .cta-section {
      background: linear-gradient(135deg, var(--primary) 0%, #7c3aed 100%);
      position: relative; overflow: hidden;
    }
    .cta-section::before {
      content: '';
      position: absolute; inset: 0;
      background: radial-gradient(ellipse 80% 80% at 50% 50%, rgba(255,255,255,.05), transparent);
    }
    .cta-section h2 { color: var(--white); font-size: clamp(1.6rem, 3vw, 2.2rem); }
    .cta-section p { color: rgba(255,255,255,.8); }
    .btn-cta {
      background: var(--white); color: var(--primary);
      font-weight: 700; border-radius: 10px;
      padding: .85rem 2.5rem; font-size: .95rem;
      transition: transform var(--transition), box-shadow var(--transition);
      border: none;
    }
    .btn-cta:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,.2); color: var(--primary); }

    /* ─── FOOTER ──────────────────────────────────────────────────────────── */
    .footer { background: var(--dark); color: #94a3b8; padding: 5rem 0 0; }
    .footer h5 { color: var(--white); font-size: 1.05rem; margin-bottom: 1.25rem; position: relative; padding-bottom: .75rem; }
    .footer h5::after {
      content: '';
      position: absolute; bottom: 0; left: 0;
      width: 32px; height: 3px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      border-radius: 2px;
    }
    .footer-brand p { font-size: .88rem; line-height: 1.75; margin-top: 1rem; color: #64748b; }
    .footer-socials { display: flex; gap: .6rem; margin-top: 1.25rem; }
    .footer-socials a {
      width: 36px; height: 36px; border-radius: 8px;
      background: #1e293b; color: #94a3b8;
      display: flex; align-items: center; justify-content: center;
      font-size: .9rem;
      transition: background var(--transition), color var(--transition);
    }
    .footer-socials a:hover { background: var(--primary); color: var(--white); }
    .footer-links { list-style: none; padding: 0; }
    .footer-links li { margin-bottom: .55rem; }
    .footer-links a { color: #64748b; font-size: .88rem; transition: color var(--transition); display: flex; align-items: center; gap: .4rem; }
    .footer-links a:hover { color: var(--primary); }
    .footer-links a i { font-size: .7rem; }
    .footer-contact li { display: flex; align-items: flex-start; gap: .75rem; margin-bottom: .75rem; font-size: .88rem; color: #64748b; }
    .footer-contact li i { color: var(--primary); font-size: 1rem; margin-top: .1rem; }
    .footer-bottom {
      margin-top: 4rem;
      background: #0a0f1e;
      padding: 1.25rem 0;
      text-align: center;
      font-size: .82rem; color: #475569;
    }

    /* ─── SCROLL TO TOP ────────────────────────────────────────────────────── */
    #scrollTop {
      position: fixed; bottom: 2rem; right: 2rem; z-index: 999;
      width: 44px; height: 44px; border-radius: 12px;
      background: var(--primary); color: var(--white);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.1rem;
      box-shadow: 0 4px 20px rgba(37,99,235,.4);
      opacity: 0; pointer-events: none;
      transition: opacity var(--transition), transform var(--transition);
      border: none; cursor: pointer;
    }
    #scrollTop.show { opacity: 1; pointer-events: auto; }
    #scrollTop:hover { transform: translateY(-3px); }

    /* ─── ANIMATIONS ──────────────────────────────────────────────────────── */
    .fade-up {
      opacity: 0; transform: translateY(30px);
      transition: opacity .6s ease, transform .6s ease;
    }
    .fade-up.visible { opacity: 1; transform: translateY(0); }
    .stagger-1 { transition-delay: .1s; }
    .stagger-2 { transition-delay: .2s; }
    .stagger-3 { transition-delay: .3s; }
    .stagger-4 { transition-delay: .4s; }

    @media (max-width: 991px) {
      .hero { min-height: auto; padding: 4rem 0; }
      .hero-img-wrap { margin-top: 3rem; }
      .welcome-badge { bottom: 10px; right: 10px; }
      .hero-float-card.c1 { left: 0; }
      .hero-float-card.c2 { right: 0; }
    }
    @media (max-width: 767px) {
      section { padding: 3.5rem 0; }
      .hero-stats { gap: 1.25rem; }
      .hero-float-card { display: none; }
    }
  </style>
</head>
<body>

<!-- ══════════════════════════════════════════════════════════════════════════
     TOPBAR
════════════════════════════════════════════════════════════════════════════ -->
<div class="topbar">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
      <div class="d-flex align-items-center gap-1 flex-wrap">
        <i class="bi bi-clock"></i>
        <span>Mon–Fri: 10AM – 4PM &nbsp;|&nbsp; Sunday Closed</span>
      </div>
      <div class="d-flex align-items-center gap-3 flex-wrap">
        <a href="mailto:info@iconschool.com"><i class="bi bi-envelope me-1"></i>info@iconschool.com</a>
        <a href="tel:+19546481802"><i class="bi bi-telephone me-1"></i>+1-954-648-1802</a>
        @auth
            <a href="{{ route('tenant.dashboard', ['tenant' => tenant('id')]) }}" class="text-warning fw-semibold">
                <i class="bi bi-speedometer2 me-1"></i>Dashboard
            </a>
        @else
            <a href="{{ route('login', ['tenant' => tenant('id')]) }}" class="text-warning fw-semibold">
                <i class="bi bi-box-arrow-in-right me-1"></i>Login
            </a>
        @endauth
      </div>
    </div>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════════════════════════
     NAVBAR
════════════════════════════════════════════════════════════════════════════ -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand d-flex align-items-center gap-2" href="#">
      <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="38" height="38" rx="10" fill="#2563eb"/>
        <path d="M9 28L19 10L29 28H9Z" fill="white" fill-opacity=".9"/>
        <rect x="14" y="20" width="10" height="8" rx="1" fill="white" fill-opacity=".5"/>
      </svg>
      <span>School One</span>
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav mx-auto gap-1">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Teachers</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Online Admission</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="#">News</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pages</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="bi bi-card-text me-2"></i>Admit Card</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-trophy me-2"></i>Exam Results</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-patch-check me-2"></i>Certificates</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
      </ul>
      @auth
            <a href="{{route('tenant.dashboard', ['tenant' => tenant('id')]) }}" class="nav-link btn-login ms-2">
                <i class="bi bi-speedometer2 me-1"></i>Dashboard
            </a>
        @else
            <a href="{{route('login', ['tenant' => tenant('id')]) }}" class="nav-link btn-login ms-2">
                <i class="bi bi-box-arrow-in-right me-1"></i>Login
            </a>
        @endauth
    </div>
  </div>
</nav>

<!-- ══════════════════════════════════════════════════════════════════════════
     NEWS TICKER
════════════════════════════════════════════════════════════════════════════ -->
<div class="news-ticker">
  <div class="container">
    <div class="d-flex align-items-center gap-3">
      <span class="label"><i class="bi bi-megaphone-fill me-1"></i>Latest News</span>
      <div class="ticker-wrap">
        <div class="ticker-items">
          <a href="#">Food Drive Collects Record Donations for Local Shelter — 10 Dec 2025</a>
          <a href="#">Mathletes Victorious at Inter-School Competition — 19 Nov 2025</a>
          <a href="#">Student Council Starts New Mentorship Program — 20 Aug 2025</a>
          <a href="#">Art Show Brings Color to Campus — 16 Jul 2025</a>
          <a href="#">Parent-Teacher Conferences Scheduled for October 20th</a>
          <a href="#">Annual School Fair a Resounding Success! — 19 Jun 2025</a>
          <!-- duplicate for seamless loop -->
          <a href="#">Food Drive Collects Record Donations for Local Shelter — 10 Dec 2025</a>
          <a href="#">Mathletes Victorious at Inter-School Competition — 19 Nov 2025</a>
          <a href="#">Student Council Starts New Mentorship Program — 20 Aug 2025</a>
          <a href="#">Art Show Brings Color to Campus — 16 Jul 2025</a>
          <a href="#">Parent-Teacher Conferences Scheduled for October 20th</a>
          <a href="#">Annual School Fair a Resounding Success! — 19 Jun 2025</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════════════════════════
     HERO
════════════════════════════════════════════════════════════════════════════ -->
<section class="hero" id="home">
  <div class="hero-shape s1"></div>
  <div class="hero-shape s2"></div>
  <div class="hero-shape s3"></div>

  <div class="container position-relative">
    <div class="row align-items-center">
      <!-- Text -->
      <div class="col-lg-6">
        <div class="hero-badge">
          <i class="bi bi-mortarboard-fill"></i>
          Welcome to School One &amp; College
        </div>
        <h1>
          Shaping <span>Tomorrow's</span><br>
          Leaders Today
        </h1>
        <p>
          A new generation of school management built to grow your institution,
          save time, and deliver outstanding academic experiences for every student.
        </p>
        <div class="hero-btns">
          <a href="#" class="btn-hero-primary">
            <i class="bi bi-play-circle me-1"></i>View Services
          </a>
          <a href="#" class="btn-hero-outline">
            Learn More <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>

        <div class="hero-stats">
          <div>
            <div class="hero-stat-num">20<span style="color:var(--accent)">+</span></div>
            <div class="hero-stat-lbl">Years Experience</div>
          </div>
          <div>
            <div class="hero-stat-num">5K<span style="color:var(--accent)">+</span></div>
            <div class="hero-stat-lbl">Students Enrolled</div>
          </div>
          <div>
            <div class="hero-stat-num">120<span style="color:var(--accent)">+</span></div>
            <div class="hero-stat-lbl">Expert Teachers</div>
          </div>
          <div>
            <div class="hero-stat-num">15<span style="color:var(--accent)">+</span></div>
            <div class="hero-stat-lbl">Branches</div>
          </div>
        </div>
      </div>

      <!-- Image -->
      <div class="col-lg-6">
        <div class="hero-img-wrap">
          <div class="hero-main-img">
            <svg width="200" height="160" viewBox="0 0 200 160" fill="none">
              <rect x="20" y="40" width="160" height="100" rx="8" fill="rgba(255,255,255,.08)"/>
              <rect x="35" y="55" width="130" height="70" rx="4" fill="rgba(255,255,255,.05)"/>
              <circle cx="100" cy="90" r="24" fill="rgba(255,255,255,.12)"/>
              <path d="M92 90l6 6 12-12" stroke="rgba(255,255,255,.6)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
              <text x="100" y="140" text-anchor="middle" fill="rgba(255,255,255,.3)" font-size="11" font-family="DM Sans,sans-serif">iconschool.ramomcoder.com</text>
            </svg>
          </div>

          <!-- Floating cards -->
          <div class="hero-float-card c1">
            <div class="fc-icon" style="background:#fef3c7;color:#d97706;"><i class="bi bi-trophy-fill"></i></div>
            <div class="fc-text">
              <div class="num">98%</div>
              <div class="lbl">Pass Rate</div>
            </div>
          </div>

          <div class="hero-float-card c2">
            <div class="fc-icon" style="background:#d1fae5;color:#059669;"><i class="bi bi-people-fill"></i></div>
            <div class="fc-text">
              <div class="num">5,000+</div>
              <div class="lbl">Students</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     FEATURE CARDS
════════════════════════════════════════════════════════════════════════════ -->
<section class="feat-section" id="features">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">What We Offer</span>
      <h2 class="section-title">Your Experience Gets Better<br>And Better Over Time</h2>
      <div class="divider-line mx-auto"></div>
      <p class="section-sub mx-auto">We have highlighted some exceptional and unique features of our system designed to create an experience you won't find anywhere else.</p>
    </div>

    <div class="row g-4">
      <div class="col-sm-6 col-lg-3 fade-up stagger-1">
        <div class="feat-card">
          <div class="feat-icon"><i class="bi bi-camera-video-fill"></i></div>
          <h5>Online Classes</h5>
          <p>Live classes via Zoom, BigBlueButton &amp; Google Meet integrated seamlessly into the platform.</p>
          <a href="#">Read More <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 fade-up stagger-2">
        <div class="feat-card">
          <div class="feat-icon"><i class="bi bi-award-fill"></i></div>
          <h5>Scholarship</h5>
          <p>Flexible scholarship management with discount and fine modules tied directly to student profiles.</p>
          <a href="#">Read More <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 fade-up stagger-3">
        <div class="feat-card">
          <div class="feat-icon"><i class="bi bi-book-fill"></i></div>
          <h5>Books &amp; Library</h5>
          <p>Advanced inventory module to manage books, issue tracking, and a full digital library catalog.</p>
          <a href="#">Read More <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 fade-up stagger-4">
        <div class="feat-card">
          <div class="feat-icon"><i class="bi bi-graph-up-arrow"></i></div>
          <h5>Trending Courses</h5>
          <p>Enable or disable course modules on-the-fly, with online paid/free exam management built in.</p>
          <a href="#">Read More <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     WELCOME / ABOUT
════════════════════════════════════════════════════════════════════════════ -->
<section id="about">
  <div class="container">
    <div class="row align-items-center g-5">
      <!-- Image -->
      <div class="col-lg-5 fade-up">
        <div class="welcome-img-wrap">
          <img src="https://iconschool.ramomcoder.com/uploads/frontend/home_page/wellcome1.png"
               alt="Welcome to School One"
               onerror="this.src='data:image/svg+xml,%3Csvg width=\'500\' height=\'380\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'500\' height=\'380\' rx=\'20\' fill=\'%23eff6ff\'/%3E%3Ctext x=\'250\' y=\'200\' text-anchor=\'middle\' fill=\'%232563eb\' font-size=\'18\' font-family=\'DM Sans\'%3ESchool One%3C/text%3E%3C/svg%3E'">
          <div class="welcome-badge">
            <div class="num">20+</div>
            <div class="lbl">Years of<br>Excellence</div>
          </div>
        </div>
      </div>

      <!-- Text -->
      <div class="col-lg-7 fade-up stagger-2">
        <span class="section-tag">Welcome To Education</span>
        <h2 class="section-title">We Will Give You<br>A Better Future</h2>
        <div class="divider-line"></div>
        <p style="color:#64748b;line-height:1.8;">
          It is a long established fact that a reader will be distracted by the readable content of a page
          when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
          distribution of letters, as opposed to using content that makes it look like readable English.
        </p>
        <ul class="check-list">
          <li><i class="bi bi-check-circle-fill"></i>School Subscription (SaaS) with powerful modules</li>
          <li><i class="bi bi-check-circle-fill"></i>Custom domains for every branch</li>
          <li><i class="bi bi-check-circle-fill"></i>QR code attendance &amp; two-factor authentication</li>
          <li><i class="bi bi-check-circle-fill"></i>13+ online payment gateways integrated</li>
          <li><i class="bi bi-check-circle-fill"></i>Progress report cards with cumulative averages</li>
        </ul>
        <a href="#" class="btn-hero-primary" style="display:inline-flex;align-items:center;gap:.5rem;text-decoration:none;">
          Online Admission <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     TEACHERS
════════════════════════════════════════════════════════════════════════════ -->
<section class="teachers-section" id="teachers">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Our Faculty</span>
      <h2 class="section-title">Experience Teachers Team</h2>
      <div class="divider-line mx-auto"></div>
      <p class="section-sub mx-auto">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search will uncover many web sites.</p>
    </div>

    <div class="row g-4">
      <div class="col-sm-6 col-lg-3 fade-up stagger-1">
        <div class="teacher-card">
          <div class="teacher-img-wrap">
            <img src="https://iconschool.ramomcoder.com/uploads/images/staff/d7342415bed40b2bece8dc5775cb35d1.jpg" alt="Summer Simpson"
                 onerror="this.style.background='#eff6ff'">
            <div class="teacher-overlay"></div>
            <div class="teacher-socials">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
              <a href="#"><i class="bi bi-twitter-x"></i></a>
            </div>
          </div>
          <div class="teacher-body">
            <h5>Summer Simpson</h5>
            <span>Science</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 fade-up stagger-2">
        <div class="teacher-card">
          <div class="teacher-img-wrap">
            <img src="https://iconschool.ramomcoder.com/uploads/images/staff/6b9a27fca0f377b3f1b445061ee7747f.jpg" alt="Jose McKinley"
                 onerror="this.style.background='#eff6ff'">
            <div class="teacher-overlay"></div>
            <div class="teacher-socials">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
              <a href="#"><i class="bi bi-twitter-x"></i></a>
            </div>
          </div>
          <div class="teacher-body">
            <h5>Jose McKinley</h5>
            <span>General</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 fade-up stagger-3">
        <div class="teacher-card">
          <div class="teacher-img-wrap">
            <img src="https://iconschool.ramomcoder.com/uploads/images/staff/21418a118dc76dd8085e6ec006528a1d.jpg" alt="Nannie Henriques"
                 onerror="this.style.background='#eff6ff'">
            <div class="teacher-overlay"></div>
            <div class="teacher-socials">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
              <a href="#"><i class="bi bi-twitter-x"></i></a>
            </div>
          </div>
          <div class="teacher-body">
            <h5>Nannie Henriques</h5>
            <span>Science</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 fade-up stagger-4">
        <div class="teacher-card">
          <div class="teacher-img-wrap">
            <img src="https://iconschool.ramomcoder.com/uploads/images/staff/45d5dffee6126d75a8d0c0d1200f2651.jpg" alt="Tamica Halcomb"
                 onerror="this.style.background='#eff6ff'">
            <div class="teacher-overlay"></div>
            <div class="teacher-socials">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-linkedin"></i></a>
              <a href="#"><i class="bi bi-twitter-x"></i></a>
            </div>
          </div>
          <div class="teacher-body">
            <h5>Tamica Halcomb</h5>
            <span>Science</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     STATS
════════════════════════════════════════════════════════════════════════════ -->
<section class="stats-section" id="stats">
  <div class="container position-relative">
    <div class="text-center mb-5">
      <h2 class="section-title" style="color:white;">20 Years Experience<br>In The Field of Study</h2>
      <p style="color:#94a3b8;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    </div>
    <div class="row g-4">
      <div class="col-6 col-lg-3 fade-up stagger-1">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-mortarboard"></i></div>
          <div class="stat-num" data-target="120">0<span>+</span></div>
          <div class="stat-lbl">Certified Teachers</div>
        </div>
      </div>
      <div class="col-6 col-lg-3 fade-up stagger-2">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-people"></i></div>
          <div class="stat-num" data-target="5000">0<span>+</span></div>
          <div class="stat-lbl">Students Enrolled</div>
        </div>
      </div>
      <div class="col-6 col-lg-3 fade-up stagger-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-camera-video"></i></div>
          <div class="stat-num" data-target="480">0<span>+</span></div>
          <div class="stat-lbl">Live Classes</div>
        </div>
      </div>
      <div class="col-6 col-lg-3 fade-up stagger-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-building"></i></div>
          <div class="stat-num" data-target="15">0<span>+</span></div>
          <div class="stat-lbl">Branches</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     TESTIMONIALS
════════════════════════════════════════════════════════════════════════════ -->
<section id="testimonials">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Testimonials</span>
      <h2 class="section-title">What People Say</h2>
      <div class="divider-line mx-auto"></div>
      <p class="section-sub mx-auto">Fusce sem dolor, interdum in efficitur at, faucibus nec lorem. Sed nec molestie justo.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6 fade-up stagger-1">
        <div class="testimonial-card">
          <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
          <p>"Intexure have done an excellent job presenting the analysis &amp; insights. I am confident in saying they have helped encounter is to be welcomed and every pain avoided."</p>
          <div class="author">
            <img src="https://iconschool.ramomcoder.com/uploads/app_image/defualt.png" alt="Ellie Hepsie"
                 onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'46\' height=\'46\'%3E%3Ccircle cx=\'23\' cy=\'23\' r=\'23\' fill=\'%23eff6ff\'/%3E%3C/svg%3E'">
            <div class="author-info">
              <strong>Ellie Hepsie</strong>
              <small>Los Angeles</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 fade-up stagger-2">
        <div class="testimonial-card">
          <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></div>
          <p>"Intexure have done an excellent job presenting the analysis &amp; insights. I am confident in saying they have helped encounter is to be welcomed and every pain avoided."</p>
          <div class="author">
            <img src="https://iconschool.ramomcoder.com/uploads/app_image/defualt.png" alt="Joy Kaylynn"
                 onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'46\' height=\'46\'%3E%3Ccircle cx=\'23\' cy=\'23\' r=\'23\' fill=\'%23eff6ff\'/%3E%3C/svg%3E'">
            <div class="author-info">
              <strong>Joy Kaylynn</strong>
              <small>Los Angeles</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     WHY CHOOSE US
════════════════════════════════════════════════════════════════════════════ -->
<section style="background:var(--light);" id="why">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-5 fade-up">
        <span class="section-tag">Why Choose Us</span>
        <h2 class="section-title">Reasons To Choose School One</h2>
        <div class="divider-line"></div>
        <p style="color:#64748b;line-height:1.8;margin-bottom:2rem;">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
          Many desktop publishing packages now use Lorem Ipsum as their default model text.
        </p>
        <div class="p-4 rounded-3" style="background:var(--primary);color:white;">
          <div class="d-flex align-items-center gap-3">
            <i class="bi bi-telephone-fill fs-2" style="color:var(--accent);"></i>
            <div>
              <div style="font-size:.8rem;opacity:.8;">Request for a free class</div>
              <div style="font-family:var(--font-head);font-size:1.4rem;font-weight:700;">+2484-398-8987</div>
            </div>
          </div>
          <a href="#" class="btn-cta mt-3 d-inline-block" style="font-size:.85rem;padding:.6rem 1.5rem;">
            Request Now <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-7 fade-up stagger-2">
        <div class="row g-3">
          <div class="col-12">
            <div class="why-item">
              <div class="why-icon"><i class="bi bi-camera-video-fill"></i></div>
              <div>
                <h6>Online Course Facilities</h6>
                <p>Making it look like readable English with live and recorded session support.</p>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="why-item">
              <div class="why-icon"><i class="bi bi-book-fill"></i></div>
              <div>
                <h6>Modern Book Library</h6>
                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum.</p>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="why-item">
              <div class="why-icon"><i class="bi bi-briefcase-fill"></i></div>
              <div>
                <h6>Be Industrial Leader</h6>
                <p>Making it look like readable English, preparing students for the real world.</p>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="why-item">
              <div class="why-icon"><i class="bi bi-code-slash"></i></div>
              <div>
                <h6>Programming Courses</h6>
                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum.</p>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="why-item">
              <div class="why-icon"><i class="bi bi-translate"></i></div>
              <div>
                <h6>Foreign Languages</h6>
                <p>Making it look like readable English with certified language instructors.</p>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="why-item">
              <div class="why-icon"><i class="bi bi-people-fill"></i></div>
              <div>
                <h6>Alumni Directory</h6>
                <p>Stay connected with a powerful alumni network and mentorship directory.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     CTA
════════════════════════════════════════════════════════════════════════════ -->
<section class="cta-section py-5">
  <div class="container position-relative text-center py-3">
    <span class="section-tag" style="background:rgba(255,255,255,.15);color:white;">Get Started</span>
    <h2 class="mt-2 mb-3">Ready to Join School One?</h2>
    <p class="mb-4" style="max-width:500px;margin:auto;">Apply for online admission today and take the first step toward an extraordinary education journey.</p>
    <a href="#" class="btn-cta">
      Online Admission <i class="bi bi-arrow-right ms-1"></i>
    </a>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     FOOTER
════════════════════════════════════════════════════════════════════════════ -->
<footer class="footer">
  <div class="container">
    <div class="row g-5">

      <!-- Brand -->
      <div class="col-lg-4">
        <div class="footer-brand">
          <div class="d-flex align-items-center gap-2 mb-3">
            <svg width="36" height="36" viewBox="0 0 38 38" fill="none">
              <rect width="38" height="38" rx="10" fill="#2563eb"/>
              <path d="M9 28L19 10L29 28H9Z" fill="white" fill-opacity=".9"/>
              <rect x="14" y="20" width="10" height="8" rx="1" fill="white" fill-opacity=".5"/>
            </svg>
            <span style="font-family:var(--font-head);font-size:1.2rem;font-weight:700;color:white;">School One</span>
          </div>
          <div style="font-size:.8rem;color:#64748b;margin-bottom:.25rem;">School One &amp; College</div>
          <div style="font-size:.75rem;color:#475569;">Oxford International School</div>
          <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
          <div class="footer-socials">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
            <a href="#"><i class="bi bi-pinterest"></i></a>
          </div>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-sm-6 col-lg-2">
        <h5>Quick Links</h5>
        <ul class="footer-links">
          <li><a href="#"><i class="bi bi-chevron-right"></i>Home</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>Teachers</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>Events</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>About Us</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>FAQ</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>Online Admission</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>Gallery</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>News</a></li>
        </ul>
      </div>

      <!-- Pages -->
      <div class="col-sm-6 col-lg-2">
        <h5>Pages</h5>
        <ul class="footer-links">
          <li><a href="#"><i class="bi bi-chevron-right"></i>Admit Card</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>Exam Results</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>Certificates</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>Contact Us</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-4">
        <h5>Address</h5>
        <ul class="footer-contact list-unstyled">
          <li><i class="bi bi-geo-alt-fill"></i>3470 Geraldine Lane, New York</li>
          <li><i class="bi bi-telephone-fill"></i>+1-954-648-1802</li>
          <li><i class="bi bi-telephone-fill"></i>001-785-987-1234</li>
          <li><i class="bi bi-envelope-fill"></i>info@iconschool.com</li>
        </ul>
      </div>

    </div>
  </div>

  <div class="footer-bottom">
    Copyright &copy; 2026 School One &amp; College. All Rights Reserved.
    Developed by <a href="#" style="color:var(--primary);">RamomCoder</a>
  </div>
</footer>

<!-- Scroll to top -->
<button id="scrollTop" onclick="window.scrollTo({top:0,behavior:'smooth'})">
  <i class="bi bi-arrow-up"></i>
</button>

<!-- Bootstrap 5.3 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // ── Scroll to top button ────────────────────────────────────────────────
  const scrollTopBtn = document.getElementById('scrollTop');
  window.addEventListener('scroll', () => {
    scrollTopBtn.classList.toggle('show', window.scrollY > 400);
  });

  // ── Fade-up on scroll ───────────────────────────────────────────────────
  const fadeEls = document.querySelectorAll('.fade-up');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  fadeEls.forEach(el => observer.observe(el));

  // ── Counter animation ───────────────────────────────────────────────────
  function animateCount(el, target, duration = 1800) {
    let start = 0, step = target / (duration / 16);
    const suffix = el.querySelector('span') ? el.querySelector('span').outerHTML : '';
    const num = el.childNodes[0];
    const timer = setInterval(() => {
      start = Math.min(start + step, target);
      num.textContent = Math.floor(start).toLocaleString();
      if (start >= target) clearInterval(timer);
    }, 16);
  }
  const statNums = document.querySelectorAll('.stat-num[data-target]');
  const statObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        animateCount(e.target, parseInt(e.target.dataset.target));
        statObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.5 });
  statNums.forEach(el => statObs.observe(el));

  // ── Sticky navbar shadow ────────────────────────────────────────────────
  window.addEventListener('scroll', () => {
    document.querySelector('.navbar').style.boxShadow =
      window.scrollY > 20 ? '0 4px 24px rgba(15,23,42,.12)' : '0 2px 20px rgba(15,23,42,.08)';
  });
</script>
</body>
</html>