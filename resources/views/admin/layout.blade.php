<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Admin') — Azeumo</title>
  @vite(['resources/css/app.css'])
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.css">
  @stack('head')
  <style>
    /* ===== WP-LIKE ADMIN RESET ===== */
    *, *::before, *::after { box-sizing: border-box; }
    html, body { margin: 0; padding: 0; height: 100%; }

    /* Variables */
    :root {
      --wp-sidebar-w: 220px;
      --wp-topbar-h: 32px;
      --wp-bg: #f0f0f1;
      --wp-sidebar-bg: #1d2327;
      --wp-sidebar-text: #a7aaad;
      --wp-sidebar-hover: #2c3338;
      --wp-sidebar-active: #FF7400;
      --wp-accent: #FF7400;
      --wp-accent-dark: #e66800;
      --wp-border: #c3c4c7;
      --wp-white: #ffffff;
      --wp-text: #1d2327;
      --wp-muted: #646970;
      --wp-success: #00a32a;
      --wp-error: #d63638;
    }

    /* ===== TOPBAR ===== */
    #wpadminbar {
      position: fixed;
      top: 0; left: 0; right: 0;
      height: var(--wp-topbar-h);
      background: #1d2327;
      z-index: 9999;
      display: flex;
      align-items: center;
      padding: 0 12px;
      gap: 0;
    }
    #wpadminbar .ab-logo {
      display: flex; align-items: center; gap: 8px;
      color: #FF7400; font-weight: 700; font-size: 13px;
      text-decoration: none;
      padding: 0 12px 0 0;
      border-right: 1px solid #2c3338;
      margin-right: 12px;
      white-space: nowrap;
    }
    #wpadminbar .ab-logo svg { width: 18px; height: 18px; }
    #wpadminbar .ab-site-link {
      color: #a7aaad; font-size: 13px; text-decoration: none;
      padding: 0 12px;
      transition: color .15s;
    }
    #wpadminbar .ab-site-link:hover { color: #fff; }
    #wpadminbar .ab-right {
      margin-left: auto;
      display: flex; align-items: center; gap: 4px;
    }
    #wpadminbar .ab-user {
      color: #a7aaad; font-size: 12px;
      display: flex; align-items: center; gap: 6px;
      padding: 0 8px;
    }
    #wpadminbar .ab-user svg { width: 14px; height: 14px; }
    #wpadminbar .ab-logout {
      color: #a7aaad; font-size: 12px; text-decoration: none;
      padding: 4px 10px;
      border: 1px solid #3c434a;
      border-radius: 3px;
      transition: all .15s;
      cursor: pointer;
      background: none;
    }
    #wpadminbar .ab-logout:hover { color: #fff; border-color: #FF7400; }

    /* ===== SIDEBAR ===== */
    #adminmenuwrap {
      position: fixed;
      top: var(--wp-topbar-h);
      left: 0;
      width: var(--wp-sidebar-w);
      bottom: 0;
      background: var(--wp-sidebar-bg);
      overflow-y: auto;
      overflow-x: hidden;
      z-index: 9990;
    }
    #adminmenu {
      margin: 0; padding: 0; list-style: none; width: 100%;
    }
    #adminmenu li { width: 100%; }
    #adminmenu .menu-item a,
    #adminmenu .menu-item button {
      display: flex;
      align-items: center;
      gap: 10px;
      width: 100%;
      padding: 10px 14px;
      color: var(--wp-sidebar-text);
      text-decoration: none;
      font-size: 13px;
      font-weight: 400;
      border: none;
      background: none;
      cursor: pointer;
      transition: background .15s, color .15s;
      text-align: left;
      line-height: 1.4;
    }
    #adminmenu .menu-item a:hover,
    #adminmenu .menu-item button:hover {
      background: var(--wp-sidebar-hover);
      color: #fff;
    }
    #adminmenu .menu-item.active > a {
      background: var(--wp-sidebar-hover);
      color: #fff;
      box-shadow: inset 3px 0 0 var(--wp-accent);
    }
    #adminmenu .menu-item svg {
      width: 18px; height: 18px; flex-shrink: 0; opacity: .75;
    }
    #adminmenu .menu-item.active svg { opacity: 1; }
    #adminmenu .menu-separator {
      height: 1px;
      background: #2c3338;
      margin: 6px 0;
    }
    #adminmenu .menu-badge {
      margin-left: auto;
      background: var(--wp-error);
      color: #fff;
      font-size: 10px;
      font-weight: 700;
      padding: 1px 6px;
      border-radius: 10px;
      min-width: 18px;
      text-align: center;
    }
    #adminmenu .menu-section-title {
      padding: 14px 14px 4px;
      font-size: 10px;
      font-weight: 600;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: #50575e;
    }

    /* Collapse toggle */
    #collapse-button {
      display: flex; align-items: center; gap: 8px;
      width: 100%; padding: 10px 14px;
      color: #50575e; font-size: 12px;
      border: none; background: none; cursor: pointer;
      margin-top: 4px;
    }
    #collapse-button:hover { color: #a7aaad; }

    /* ===== MAIN WRAPPER ===== */
    #wpcontent {
      margin-left: var(--wp-sidebar-w);
      margin-top: var(--wp-topbar-h);
      min-height: calc(100vh - var(--wp-topbar-h));
      background: var(--wp-bg);
    }
    #wpbody-content {
      padding: 16px 20px 20px;
    }

    /* ===== PAGE TITLE ===== */
    .wp-heading-inline {
      font-size: 23px;
      font-weight: 400;
      color: var(--wp-text);
      margin: 0 8px 0 0;
      line-height: 1.3;
    }
    .page-title-action {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 4px 10px;
      background: var(--wp-accent);
      color: #fff;
      font-size: 13px;
      font-weight: 500;
      border-radius: 3px;
      text-decoration: none;
      transition: background .15s;
      margin-left: 4px;
      vertical-align: middle;
    }
    .page-title-action:hover { background: var(--wp-accent-dark); color: #fff; }
    .title-area { margin-bottom: 16px; display: flex; align-items: center; flex-wrap: wrap; gap: 8px; }

    /* ===== NOTICES ===== */
    .notice {
      margin: 0 0 16px;
      padding: 10px 14px;
      border-left: 4px solid transparent;
      background: var(--wp-white);
      box-shadow: 0 1px 1px rgba(0,0,0,.04);
      border-radius: 0 3px 3px 0;
      font-size: 14px;
    }
    .notice-success { border-color: var(--wp-success); }
    .notice-error { border-color: var(--wp-error); }
    .notice p { margin: 0; }

    /* ===== WP TABLE ===== */
    .wp-list-table {
      width: 100%;
      border-collapse: collapse;
      background: var(--wp-white);
      border-radius: 3px;
      box-shadow: 0 1px 1px rgba(0,0,0,.04);
      font-size: 13px;
    }
    .wp-list-table thead th {
      background: var(--wp-white);
      border-bottom: 1px solid var(--wp-border);
      padding: 10px 8px;
      text-align: left;
      font-size: 13px;
      font-weight: 600;
      color: var(--wp-text);
    }
    .wp-list-table thead th:first-child { padding-left: 10px; }
    .wp-list-table tbody tr {
      border-bottom: 1px solid #f0f0f1;
      transition: background .1s;
    }
    .wp-list-table tbody tr:hover { background: #f6f7f7; }
    .wp-list-table tbody tr:last-child { border-bottom: none; }
    .wp-list-table td {
      padding: 10px 8px;
      vertical-align: middle;
      color: var(--wp-text);
    }
    .wp-list-table td:first-child { padding-left: 10px; }
    .wp-list-table td.column-title { font-weight: 600; }

    /* Row actions (hidden until hover) */
    .row-actions {
      display: flex; gap: 6px;
      margin-top: 4px;
      font-size: 12px;
      visibility: hidden;
      opacity: 0;
      transition: opacity .15s;
    }
    .wp-list-table tbody tr:hover .row-actions {
      visibility: visible; opacity: 1;
    }
    .row-actions a { color: #2271b1; text-decoration: none; }
    .row-actions a:hover { text-decoration: underline; }
    .row-actions .trash a,
    .row-actions .delete button { color: var(--wp-error); }
    .row-actions .delete button {
      background: none; border: none; padding: 0; cursor: pointer;
      font-size: 12px; font-family: inherit;
    }
    .row-actions .delete button:hover { text-decoration: underline; }
    .row-actions span::after { content: ' |'; color: var(--wp-border); margin-left: 6px; }
    .row-actions span:last-child::after { content: ''; }

    /* Status badges */
    .status-badge {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 2px 8px;
      border-radius: 2px;
      font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: .04em;
    }
    .status-badge.published { background: #edfaef; color: #00a32a; }
    .status-badge.draft { background: #f0f0f1; color: #646970; }
    .status-badge.unread { background: #fcf0f1; color: #d63638; font-weight: 700; }
    .status-badge.read { background: #f0f6fc; color: #2271b1; }

    /* ===== POSTBOX / METABOX ===== */
    .postbox {
      background: var(--wp-white);
      border: 1px solid var(--wp-border);
      border-radius: 3px;
      box-shadow: 0 1px 1px rgba(0,0,0,.04);
      margin-bottom: 16px;
    }
    .postbox .postbox-header {
      display: flex; align-items: center; justify-content: space-between;
      padding: 10px 12px;
      border-bottom: 1px solid var(--wp-border);
    }
    .postbox .postbox-header h2 {
      font-size: 14px; font-weight: 600; color: var(--wp-text);
      margin: 0;
    }
    .postbox .inside { padding: 12px; }

    /* ===== FORM STYLES ===== */
    .form-field {
      margin-bottom: 16px;
    }
    .form-field label {
      display: block;
      font-size: 14px;
      font-weight: 600;
      color: var(--wp-text);
      margin-bottom: 6px;
    }
    .form-field .description {
      display: block;
      font-size: 12px;
      color: var(--wp-muted);
      margin-top: 4px;
    }
    input[type=text].regular-text,
    input[type=email].regular-text,
    input[type=number].small-text,
    .wp-input {
      display: block;
      width: 100%;
      padding: 6px 10px;
      border: 1px solid var(--wp-border);
      border-radius: 3px;
      font-size: 14px;
      color: var(--wp-text);
      background: var(--wp-white);
      outline: none;
      transition: border-color .15s, box-shadow .15s;
      line-height: 1.5;
    }
    input.small-text { width: 80px !important; }
    input[type=text].regular-text:focus,
    input[type=email].regular-text:focus,
    .wp-input:focus {
      border-color: var(--wp-accent);
      box-shadow: 0 0 0 1px var(--wp-accent);
    }
    textarea.wp-textarea {
      display: block;
      width: 100%;
      padding: 8px 10px;
      border: 1px solid var(--wp-border);
      border-radius: 3px;
      font-size: 13px;
      color: var(--wp-text);
      background: var(--wp-white);
      outline: none;
      resize: vertical;
      line-height: 1.6;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      transition: border-color .15s, box-shadow .15s;
    }
    textarea.wp-textarea:focus {
      border-color: var(--wp-accent);
      box-shadow: 0 0 0 1px var(--wp-accent);
    }
    textarea.code { font-family: 'Courier New', monospace; font-size: 12px; }

    /* Title input WP style */
    #title {
      width: 100%;
      padding: 12px 14px;
      font-size: 22px;
      font-weight: 400;
      border: 1px solid var(--wp-border);
      border-radius: 3px;
      color: var(--wp-text);
      background: var(--wp-white);
      outline: none;
      line-height: 1.4;
      margin-bottom: 4px;
      transition: border-color .15s, box-shadow .15s;
    }
    #title:focus {
      border-color: var(--wp-accent);
      box-shadow: 0 0 0 1px var(--wp-accent);
    }
    #title::placeholder { color: #c3c4c7; }

    /* WP checkbox */
    .wp-check { display: flex; align-items: center; gap: 8px; }
    .wp-check input[type=checkbox] { width: 16px; height: 16px; accent-color: var(--wp-accent); }
    .wp-check label { font-size: 13px; color: var(--wp-text); margin: 0; font-weight: 400; }

    /* ===== PUBLISH BOX ===== */
    .publish-box {}
    .publish-box .publish-action {
      background: #f6f7f7;
      padding: 10px 12px;
      border-top: 1px solid var(--wp-border);
      display: flex; align-items: center; justify-content: space-between;
      margin: 0 -12px -12px;
      border-radius: 0 0 3px 3px;
    }
    .publish-status-row {
      display: flex; align-items: center; justify-content: space-between;
      padding: 6px 0;
      font-size: 13px;
      color: var(--wp-text);
      border-bottom: 1px solid #f0f0f1;
    }
    .publish-status-row:last-of-type { border-bottom: none; margin-bottom: 12px; }
    .publish-status-row strong { font-weight: 600; }
    .publish-status-row select {
      font-size: 12px; padding: 2px 4px; border: 1px solid var(--wp-border); border-radius: 2px;
      accent-color: var(--wp-accent);
    }

    /* Buttons */
    .button {
      display: inline-flex; align-items: center; gap: 6px;
      padding: 5px 12px;
      font-size: 13px; font-weight: 400;
      border: 1px solid #c3c4c7;
      border-radius: 3px;
      cursor: pointer;
      text-decoration: none;
      transition: all .15s;
      background: #f6f7f7;
      color: #1d2327;
      line-height: 1.5;
    }
    .button:hover { background: #f0f0f1; border-color: #8c8f94; color: #1d2327; }
    .button-primary {
      background: var(--wp-accent);
      color: #fff !important;
      border-color: var(--wp-accent-dark);
      font-weight: 500;
    }
    .button-primary:hover { background: var(--wp-accent-dark); border-color: var(--wp-accent-dark); }
    .button-link-delete {
      background: none; border: none; color: var(--wp-error);
      padding: 5px 0; cursor: pointer; font-size: 13px;
      font-family: inherit;
    }
    .button-link-delete:hover { text-decoration: underline; }

    /* Save draft */
    #save-post {
      background: none; border: 1px solid #c3c4c7; color: #646970;
      padding: 5px 10px; font-size: 13px; border-radius: 3px; cursor: pointer;
      font-family: inherit; transition: all .15s;
    }
    #save-post:hover { border-color: #8c8f94; color: #1d2327; }

    /* ===== TWO-COLUMN EDIT LAYOUT ===== */
    #poststuff { display: flex; gap: 16px; align-items: flex-start; }
    #post-body { flex: 1; min-width: 0; }
    #postbox-container-1 { width: 260px; flex-shrink: 0; position: sticky; top: calc(var(--wp-topbar-h) + 16px); }

    /* Error message */
    .field-error { font-size: 12px; color: var(--wp-error); margin-top: 4px; }

    /* Lang tabs */
    .lang-tabs { display: flex; gap: 0; margin-bottom: 0; border-bottom: 1px solid var(--wp-border); }
    .lang-tab {
      padding: 6px 14px; font-size: 13px; color: var(--wp-muted);
      border: 1px solid transparent; border-bottom: none;
      cursor: pointer; border-radius: 3px 3px 0 0;
      background: transparent; font-family: inherit;
      transition: all .15s;
    }
    .lang-tab.active {
      background: var(--wp-white); color: var(--wp-text);
      border-color: var(--wp-border);
      border-bottom-color: var(--wp-white);
      margin-bottom: -1px;
    }
    .lang-panel { display: none; }
    .lang-panel.active { display: block; }

    /* Message cards */
    .message-card {
      background: var(--wp-white);
      border: 1px solid var(--wp-border);
      border-radius: 3px;
      padding: 14px 16px;
      margin-bottom: 10px;
      box-shadow: 0 1px 1px rgba(0,0,0,.04);
    }
    .message-card.unread { border-left: 4px solid var(--wp-accent); }
    .message-card.read { border-left: 4px solid var(--wp-border); }

    /* Tablenav */
    .tablenav { display: flex; align-items: center; justify-content: space-between; padding: 6px 0; min-height: 36px; }
    .tablenav-pages { font-size: 13px; color: var(--wp-muted); }

    /* Dashboard widgets */
    .dashboard-widget-wrap { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 20px; }
    .dashboard-widget {
      background: var(--wp-white);
      border: 1px solid var(--wp-border);
      border-radius: 3px;
      box-shadow: 0 1px 1px rgba(0,0,0,.04);
      padding: 20px;
      text-align: center;
    }
    .dashboard-widget .widget-count { font-size: 36px; font-weight: 700; color: var(--wp-accent); line-height: 1; display: block; }
    .dashboard-widget .widget-label { font-size: 13px; color: var(--wp-muted); margin-top: 6px; display: block; }
    .dashboard-widget .widget-icon { font-size: 24px; margin-bottom: 8px; display: block; }
    .dashboard-widget a { text-decoration: none; }
    .dashboard-widget a:hover .widget-count { color: var(--wp-accent-dark); }

    /* Quick links */
    .wp-quicklinks { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 16px; }

    @media (max-width: 960px) {
      #poststuff { flex-direction: column; }
      #postbox-container-1 { width: 100%; position: static; }
      .dashboard-widget-wrap { grid-template-columns: 1fr 1fr; }
    }
  </style>
</head>
<body style="background:#f0f0f1; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif; color:#1d2327;">

<!-- TOP BAR -->
<div id="wpadminbar">
  <a href="{{ route('admin.dashboard') }}" class="ab-logo">
    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
    Azeumo
  </a>
  <a href="{{ url('/') }}" target="_blank" class="ab-site-link">
    ↗ Voir le site
  </a>
  <div class="ab-right">
    <span class="ab-user">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
      {{ auth()->user()?->name ?? 'Admin' }}
    </span>
    <form method="POST" action="{{ route('logout') }}" style="margin:0;">
      @csrf
      <button class="ab-logout" type="submit">Déconnexion</button>
    </form>
  </div>
</div>

<!-- SIDEBAR -->
<div id="adminmenuwrap">
  <ul id="adminmenu">
    <li style="padding:16px 14px 10px;">
      <span style="color:#FF7400;font-weight:700;font-size:15px;">Azeumo</span>
      <span style="color:#50575e;font-size:11px;display:block;margin-top:1px;">Tableau de bord</span>
    </li>

    <li class="menu-separator"></li>

    <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <a href="{{ route('admin.dashboard') }}">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        Tableau de bord
      </a>
    </li>

    <li class="menu-separator"></li>
    <li class="menu-section-title">Contenu</li>

    <li class="menu-item {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
      <a href="{{ route('admin.posts.index') }}">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        Articles
      </a>
    </li>

    <li class="menu-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
      <a href="{{ route('admin.services.index') }}">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        Services
      </a>
    </li>

    <li class="menu-separator"></li>
    <li class="menu-section-title">Communication</li>

    <li class="menu-item {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
      <a href="{{ route('admin.messages.index') }}">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        Messages
        @php $unread = \App\Models\ContactMessage::where('read', false)->count(); @endphp
        @if($unread > 0)
          <span class="menu-badge">{{ $unread }}</span>
        @endif
      </a>
    </li>

    <li class="menu-separator"></li>

    <li class="menu-item">
      <a href="{{ url('/') }}" target="_blank">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        Voir le site
      </a>
    </li>
  </ul>
</div>

<!-- MAIN CONTENT -->
<div id="wpcontent">
  <div id="wpbody-content">

    @if(session('success'))
      <div class="notice notice-success"><p>{{ session('success') }}</p></div>
    @endif
    @if(session('error'))
      <div class="notice notice-error"><p>{{ session('error') }}</p></div>
    @endif

    @yield('content')

  </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
<script>
  // Lang tabs
  document.querySelectorAll('.lang-tab').forEach(tab => {
    tab.addEventListener('click', () => {
      const group = tab.closest('.lang-tabs-group');
      const target = tab.dataset.target;
      group.querySelectorAll('.lang-tab').forEach(t => t.classList.remove('active'));
      group.querySelectorAll('.lang-panel').forEach(p => p.classList.remove('active'));
      tab.classList.add('active');
      group.querySelector('#' + target).classList.add('active');
    });
  });
</script>
@stack('scripts')
</body>
</html>
