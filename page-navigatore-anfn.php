<?php
/**
 * Template Name: ANFN – Navigatore Convenzioni 2026
 * Template Post Type: page
 *
 * Installazione:
 *   1. Copia questo file nella cartella del tuo tema attivo
 *      (es. /wp-content/themes/astra/ oppure /wp-content/themes/generatepress/)
 *   2. Vai su WordPress → Pagine → Aggiungi nuova
 *   3. Nella colonna destra, sotto "Attributi pagina", seleziona
 *      "ANFN – Navigatore Convenzioni 2026" dal menu "Template"
 *   4. Pubblica la pagina
 *
 * Questo template è autonomo: bypassa header e footer del tema
 * per offrire un'esperienza full-screen senza elementi superflui.
 * Mantiene wp_head() e wp_footer() per compatibilità con plugin
 * (cookie banner, SEO, analytics, ecc.).
 *
 * @package ANFN
 * @version 1.0.0
 */

// Sicurezza: blocca accesso diretto al file
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Recupera il titolo e la descrizione dalla pagina WordPress
$page_title       = get_the_title() ?: 'ANFN – Navigatore Convenzioni 2026';
$page_description = 'Tutte le convenzioni ANFN attive organizzate per settore. ' .
                    'Scopri i vantaggi riservati alle famiglie associate con tessera 2026 valida.';
$site_url         = esc_url( home_url( '/' ) );
$logo_url         = esc_url( get_site_icon_url( 64, $site_url ) );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc_html( $page_title ); ?> | <?php bloginfo( 'name' ); ?></title>
    <meta name="description" content="<?php echo esc_attr( $page_description ); ?>">

    <!-- Open Graph -->
    <meta property="og:title"       content="<?php echo esc_attr( $page_title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $page_description ); ?>">
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="<?php echo esc_url( get_permalink() ); ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Karla:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

    <style>
    /* ── RESET COMPLETO: anulla stili del tema ── */
    html, body {
        margin: 0 !important;
        padding: 0 !important;
        height: 100% !important;
        overflow: hidden !important;
        background: #f4f1ec !important;
    }
    /* Nasconde header/footer/sidebar del tema se presenti */
    .site-header, .site-footer, #header, #footer,
    #wpadminbar + * > header, #wpadminbar + * > footer,
    .wp-site-blocks > header, .wp-site-blocks > footer { display: none !important; }

    /* ── VARIABILI ── */
    :root {
        --bg:          #f4f1ec;
        --paper:       #fffefb;
        --ink:         #1a1208;
        --muted:       #7a7060;
        --rule:        #ddd5c5;
        --nat:         #1b3d6e;
        --nat-light:   #e8eef6;
        --reg:         #2a5c45;
        --reg-light:   #e6f2ec;
        --gold:        #b07d2a;
        --gold-light:  #fdf3e0;
        --sidebar-w:   290px;
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    /* ── LAYOUT RADICE ── */
    #anfn-root {
        display: flex;
        flex-direction: column;
        height: 100vh;
        font-family: 'Karla', sans-serif;
        color: var(--ink);
        background: var(--bg);
        /* Abbassa di 32px se la barra wp-admin è visibile */
        margin-top: 0;
    }
    body.admin-bar #anfn-root { height: calc(100vh - 32px); }
    @media screen and (max-width: 782px) {
        body.admin-bar #anfn-root { height: calc(100vh - 46px); }
    }

    /* ── TOP BAR ── */
    .anfn-topbar {
        height: 54px;
        background: var(--ink);
        display: flex;
        align-items: center;
        padding: 0 20px;
        gap: 16px;
        flex-shrink: 0;
        z-index: 50;
    }
    .anfn-topbar a { text-decoration: none; }
    .anfn-logo {
        font-family: 'Libre Baskerville', serif;
        font-size: 15px;
        color: #fff;
        letter-spacing: .03em;
    }
    .anfn-logo em { color: var(--gold); font-style: italic; }
    .anfn-sep { width: 1px; height: 20px; background: rgba(255,255,255,.15); }
    .anfn-topbar-title {
        font-size: 12px;
        color: rgba(255,255,255,.5);
        letter-spacing: .06em;
        text-transform: uppercase;
    }
    .anfn-badge {
        margin-left: auto;
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.15);
        border-radius: 3px;
        padding: 3px 10px;
        font-size: 11px;
        color: rgba(255,255,255,.6);
    }
    .anfn-badge strong { color: #fff; }
    .anfn-home-link {
        font-size: 11px;
        color: rgba(255,255,255,.4);
        letter-spacing: .04em;
        transition: color .2s;
    }
    .anfn-home-link:hover { color: rgba(255,255,255,.8); }

    /* ── BARRA DI RICERCA ── */
    .anfn-searchbar {
        background: var(--paper);
        border-bottom: 1px solid var(--rule);
        padding: 10px 16px;
        flex-shrink: 0;
    }
    .anfn-search-wrap { position: relative; }
    .anfn-search-icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--muted);
        font-size: 14px;
        pointer-events: none;
    }
    .anfn-search-input {
        width: 100%;
        border: 1px solid var(--rule);
        border-radius: 3px;
        padding: 8px 12px 8px 32px;
        font-family: 'Karla', sans-serif;
        font-size: 13px;
        background: var(--bg);
        color: var(--ink);
        outline: none;
        transition: border-color .2s;
    }
    .anfn-search-input:focus { border-color: var(--nat); }

    /* ── APP BODY ── */
    .anfn-body {
        display: flex;
        flex: 1;
        overflow: hidden;
    }

    /* ── SIDEBAR ── */
    .anfn-sidebar {
        width: var(--sidebar-w);
        min-width: var(--sidebar-w);
        background: var(--paper);
        border-right: 1px solid var(--rule);
        overflow-y: auto;
        flex-shrink: 0;
    }
    .anfn-sidebar::-webkit-scrollbar { width: 4px; }
    .anfn-sidebar::-webkit-scrollbar-thumb { background: var(--rule); border-radius: 2px; }

    /* Toggle scope */
    .anfn-scope-toggle { display: flex; border-bottom: 1px solid var(--rule); }
    .anfn-scope-btn {
        flex: 1;
        padding: 11px 8px;
        font-family: 'Karla', sans-serif;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .08em;
        text-transform: uppercase;
        border: none;
        background: none;
        cursor: pointer;
        color: var(--muted);
        border-bottom: 2px solid transparent;
        transition: all .2s;
    }
    .anfn-scope-btn:hover { color: var(--ink); }
    .anfn-scope-btn.active { color: var(--nat); border-bottom-color: var(--nat); }
    .anfn-scope-btn.active.reg { color: var(--reg); border-bottom-color: var(--reg); }

    /* Albero navigazione */
    .anfn-tree-section { padding: 8px 0; }
    .anfn-group-hdr {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 14px;
        cursor: pointer;
        user-select: none;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .05em;
        text-transform: uppercase;
        color: var(--muted);
        transition: background .15s;
    }
    .anfn-group-hdr:hover { background: #f5f1ea; }
    .anfn-group-hdr .g-arrow {
        font-size: 10px;
        transition: transform .2s;
        margin-left: auto;
    }
    .anfn-group-hdr.open .g-arrow { transform: rotate(90deg); }
    .anfn-group-hdr .g-count {
        font-size: 10px;
        background: var(--rule);
        border-radius: 20px;
        padding: 1px 7px;
        font-weight: 500;
        color: var(--muted);
    }
    .anfn-tree-items { display: none; }
    .anfn-tree-items.open { display: block; }
    .anfn-tree-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 14px 8px 36px;
        cursor: pointer;
        font-size: 13px;
        transition: background .15s;
        border-left: 2px solid transparent;
    }
    .anfn-tree-item:hover { background: #f5f1ea; }
    .anfn-tree-item.active {
        background: var(--nat-light);
        border-left-color: var(--nat);
        font-weight: 600;
        color: var(--nat);
    }
    .anfn-tree-item.active.reg {
        background: var(--reg-light);
        border-left-color: var(--reg);
        color: var(--reg);
    }
    .scope-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }

    /* ── PANNELLO PRINCIPALE ── */
    .anfn-main {
        flex: 1;
        overflow-y: auto;
        background: var(--bg);
    }
    .anfn-main::-webkit-scrollbar { width: 5px; }
    .anfn-main::-webkit-scrollbar-thumb { background: var(--rule); border-radius: 2px; }

    /* Schermata benvenuto */
    .anfn-welcome {
        padding: 48px 40px;
        max-width: 680px;
    }
    .anfn-welcome-headline {
        font-family: 'Libre Baskerville', serif;
        font-size: 28px;
        line-height: 1.3;
        margin-bottom: 16px;
    }
    .anfn-welcome-sub {
        font-size: 14px;
        color: var(--muted);
        line-height: 1.7;
    }
    .anfn-welcome-steps { margin-top: 24px; display: flex; flex-direction: column; gap: 10px; }
    .anfn-welcome-step { display: flex; align-items: flex-start; gap: 12px; font-size: 13px; }
    .step-num {
        width: 22px; height: 22px; border-radius: 50%;
        background: var(--ink); color: #fff;
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 700; flex-shrink: 0;
    }

    /* Pannello convenzione */
    .anfn-conv-panel { padding: 28px 32px 64px; }
    .anfn-conv-hdr { margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid var(--rule); }
    .anfn-breadcrumb {
        font-size: 11px; color: var(--muted);
        letter-spacing: .06em; text-transform: uppercase; margin-bottom: 8px;
    }
    .anfn-conv-title {
        font-family: 'Libre Baskerville', serif;
        font-size: 24px; line-height: 1.2;
    }
    .anfn-scope-badge {
        display: inline-flex; align-items: center; gap: 6px; margin-top: 10px;
        border-radius: 3px; padding: 4px 12px; font-size: 11px;
        font-weight: 700; letter-spacing: .06em; text-transform: uppercase;
    }
    .anfn-scope-badge.nat { background: var(--nat-light); color: var(--nat); }
    .anfn-scope-badge.reg { background: var(--reg-light); color: var(--reg); }

    /* Blocco vantaggi */
    .anfn-benefit-block {
        background: var(--gold-light);
        border: 1px solid #e8c97a;
        border-left: 4px solid var(--gold);
        border-radius: 3px;
        padding: 14px 16px;
        margin-bottom: 18px;
    }
    .anfn-benefit-label {
        font-size: 10px; font-weight: 700; letter-spacing: .12em;
        text-transform: uppercase; color: var(--gold); margin-bottom: 8px;
    }
    .anfn-benefit-item {
        display: flex; align-items: flex-start; gap: 8px;
        font-size: 13px; line-height: 1.5; margin-bottom: 6px;
    }
    .anfn-benefit-item:last-child { margin-bottom: 0; }
    .anfn-bullet { color: var(--gold); font-weight: 700; flex-shrink: 0; }

    /* Blocco info */
    .anfn-info-block { margin-bottom: 14px; }
    .anfn-info-label {
        font-size: 12px; font-weight: 700; letter-spacing: .06em;
        text-transform: uppercase; color: var(--muted); margin-bottom: 6px;
    }
    .anfn-info-text { font-size: 13.5px; line-height: 1.7; color: #333; }

    /* Chip info */
    .anfn-chip-row { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 14px; }
    .anfn-chip {
        background: var(--paper); border: 1px solid var(--rule);
        border-radius: 3px; padding: 4px 10px; font-size: 11px; color: var(--muted);
    }
    .anfn-chip a { color: var(--nat); text-decoration: none; }
    .anfn-chip a:hover { text-decoration: underline; }

    /* Nota tessera */
    .anfn-tessera-note {
        margin-top: 12px; padding: 10px 14px;
        background: #f0f5ff; border: 1px solid #b8cce8; border-radius: 3px;
        font-size: 12px; color: #2a4a7f; line-height: 1.6;
    }
    .anfn-tessera-note a { color: var(--nat); }

    /* Card convenzione (regionale) */
    .anfn-conv-card {
        background: var(--paper); border: 1px solid var(--rule);
        border-radius: 3px; margin-bottom: 14px;
        transition: box-shadow .2s;
    }
    .anfn-conv-card:hover { box-shadow: 0 2px 10px rgba(0,0,0,.07); }
    .anfn-card-hdr {
        display: flex; align-items: center; gap: 14px;
        padding: 14px 18px; cursor: pointer;
    }
    .anfn-card-name { font-size: 14px; font-weight: 700; flex: 1; }
    .anfn-card-chevron { color: var(--muted); font-size: 12px; transition: transform .2s; }
    .anfn-conv-card.open .anfn-card-chevron { transform: rotate(180deg); }
    .anfn-card-body {
        display: none;
        border-top: 1px solid var(--rule);
        padding: 14px 18px 16px;
    }
    .anfn-conv-card.open .anfn-card-body { display: block; }

    /* Region intro */
    .anfn-region-intro {
        background: var(--paper); border: 1px solid var(--rule);
        border-radius: 3px; padding: 14px 18px; margin-bottom: 20px;
        font-size: 12px; color: var(--muted); line-height: 1.7;
    }
    .anfn-region-intro a { color: var(--reg); }

    /* Risultati ricerca */
    .anfn-search-results { padding: 20px 32px; }
    .anfn-search-title {
        font-size: 12px; color: var(--muted); letter-spacing: .06em;
        text-transform: uppercase; margin-bottom: 16px;
    }
    .anfn-no-results { padding: 48px; text-align: center; color: var(--muted); font-size: 14px; }
    .anfn-result-card {
        background: var(--paper); border: 1px solid var(--rule);
        border-radius: 3px; margin-bottom: 10px; cursor: pointer;
        transition: box-shadow .15s;
    }
    .anfn-result-card:hover { box-shadow: 0 2px 8px rgba(0,0,0,.08); }
    .anfn-result-hdr { display: flex; align-items: center; gap: 10px; padding: 12px 16px; }
    .anfn-result-name { font-weight: 700; font-size: 14px; flex: 1; }
    .anfn-result-tag {
        font-size: 10px; letter-spacing: .07em; text-transform: uppercase;
        padding: 2px 8px; border-radius: 20px; background: var(--bg); color: var(--muted);
    }
    .anfn-result-preview { padding: 0 16px 10px; font-size: 12px; color: var(--muted); line-height: 1.5; }

    /* ── RESPONSIVE ── */
    @media (max-width: 700px) {
        .anfn-sidebar {
            width: 100%; min-width: 100%;
            position: absolute; z-index: 30;
            top: 0; bottom: 0;
            transform: translateX(-100%);
            transition: transform .25s ease;
        }
        .anfn-sidebar.open { transform: none; }
        .anfn-main { width: 100%; }
        .anfn-conv-panel { padding: 16px 16px 48px; }
        .anfn-welcome { padding: 24px 16px; }
        .anfn-mobile-toggle {
            display: flex !important;
            align-items: center;
            justify-content: center;
            width: 34px; height: 34px;
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            margin-right: 4px;
        }
    }
    .anfn-mobile-toggle { display: none; }
    </style>
</head>
<body <?php body_class( 'anfn-fullscreen' ); ?>>

<div id="anfn-root">

    <!-- TOP BAR -->
    <div class="anfn-topbar">
        <button class="anfn-mobile-toggle" id="anfnMobileToggle" aria-label="Apri menu">☰</button>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="anfn-logo">
            ANFN <em>Convenzioni</em>
        </a>
        <div class="anfn-sep"></div>
        <div class="anfn-topbar-title">Navigatore 2026</div>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="anfn-home-link" style="margin-left: auto; margin-right: 12px;">
            ← <?php bloginfo( 'name' ); ?>
        </a>
        <div class="anfn-badge">Tessera <strong>2026</strong> obbligatoria</div>
    </div>

    <!-- BARRA RICERCA -->
    <div class="anfn-searchbar">
        <div class="anfn-search-wrap">
            <span class="anfn-search-icon">🔍</span>
            <input
                class="anfn-search-input"
                id="anfnSearch"
                type="search"
                placeholder="Cerca convenzione, azienda, settore, regione…"
                autocomplete="off"
            >
        </div>
    </div>

    <!-- CORPO APP -->
    <div class="anfn-body">

        <!-- SIDEBAR -->
        <nav class="anfn-sidebar" id="anfnSidebar" aria-label="Navigazione convenzioni">
            <div class="anfn-scope-toggle">
                <button class="anfn-scope-btn active"
                        id="btnNaz"
                        onclick="anfn.setScope('naz')"
                        aria-pressed="true">
                    🇮🇹 Nazionali
                </button>
                <button class="anfn-scope-btn"
                        id="btnReg"
                        onclick="anfn.setScope('reg')"
                        aria-pressed="false">
                    📍 Regionali
                </button>
            </div>
            <div class="anfn-tree-section" id="anfnTreeNaz"></div>
            <div class="anfn-tree-section" id="anfnTreeReg" style="display:none"></div>
        </nav>

        <!-- PANNELLO PRINCIPALE -->
        <main class="anfn-main" id="anfnMain" role="main"></main>

    </div><!-- /.anfn-body -->
</div><!-- /#anfn-root -->

<?php wp_footer(); ?>

<script>
/* =================================================
   ANFN NAVIGATORE — dati e logica applicativa
   Versione: 1.0.0 | Aggiornamento dati: maggio 2026
   ================================================= */
const anfn = (function() {

    /* ─────────────────────────────────────────────
       DATASET — CONVENZIONI NAZIONALI
       Fonte: portale convenzioni.famiglienumerose.org
       ───────────────────────────────────────────── */
    const NATIONAL = [
        {
            id:'alim', label:'Alimentari & Prodotti Tipici', icon:'🥗',
            items:[
                {
                    name:'Caseificio Ferrarini & Bonetti',
                    cat:'Formaggi DOP',
                    url:'https://convenzioni.famiglienumerose.org/caseificio-ferrarini-bonetti/',
                    desc:'Parmigiano Reggiano DOP da caseificio artigianale con oltre 50 anni di storia. Vendita diretta al consumatore.',
                    benefits:[
                        'Prezzi di particolare favore sull\'acquisto diretto di Parmigiano Reggiano DOP',
                        'Accesso diretto al caseificio senza intermediari'
                    ],
                    how:'Contattare direttamente il caseificio esibendo la tessera ANFN 2026 in corso di validità'
                },
                {
                    name:'Agrisicilia SpA',
                    cat:'Conserve di agrumi',
                    url:'https://convenzioni.famiglienumerose.org/agrisicilia/',
                    desc:'Marmellate, confetture e creme di agrumi siciliani di qualità certificata.',
                    benefits:['Prezzi riservati ai soci ANFN su tutta la gamma di marmellate, confetture e creme di agrumi'],
                    how:'Acquisto online o diretto comunicando la qualità di socio ANFN 2026'
                },
                {
                    name:'Az. Agr. Francesco De Angelis',
                    cat:'Vini biologici',
                    url:'https://convenzioni.famiglienumerose.org/azienda-agricola-francesco-de-angelis/',
                    desc:'Vino, Spumante e Grappa da uve biologiche certificate — Asprinio d\'Aversa (Campania).',
                    benefits:['Acquisto a condizioni di favore su tutta la gamma: vini, spumanti e grappa biologici'],
                    how:'Acquisto diretto dall\'azienda comunicando l\'appartenenza ANFN'
                },
                {
                    name:'Società Agricola Trevi – Il Frantoio',
                    cat:'Olio EVO',
                    url:'https://convenzioni.famiglienumerose.org/societa-agricola-trevi-il-frantoio/',
                    desc:'Olio extravergine di oliva di qualità umbra (Trevi, PG). Produzione artigianale a filiera corta.',
                    benefits:['Prezzi agevolati su olio EVO direttamente dal frantoio, a filiera corta'],
                    how:'Acquisto diretto esibendo la tessera ANFN 2026'
                },
                {
                    name:'Az. Agr. Vincenzo Marvulli',
                    cat:'Olio EVO e pasta',
                    url:'https://convenzioni.famiglienumerose.org/azienda-agricola-vincenzo-marvulli/',
                    desc:'Olio extravergine di oliva e pasta artigianale di grano Senatore Cappelli (Puglia).',
                    benefits:['Prezzi convenzionati su olio EVO pugliese e pasta artigianale Senatore Cappelli'],
                    how:'Acquisto diretto o tramite portale ANFN con codice riservato dall\'area soci'
                },
                {
                    name:'Senatore Vini',
                    cat:'Vini biologici DOP/IGP',
                    url:'https://convenzioni.famiglienumerose.org/senatore-vini/',
                    desc:'Vini biologici DOP Cirò e IGP Calabria. Produzione familiare certificata.',
                    benefits:['Prezzi riservati su tutta la gamma di vini biologici certificati calabresi'],
                    how:'Acquisto diretto comunicando la qualità di socio ANFN'
                },
            ]
        },
        {
            id:'abbigliamento', label:'Abbigliamento & Cerimonia', icon:'👔',
            items:[
                {
                    name:'Camiciamoci',
                    cat:'Abbigliamento online',
                    url:'https://convenzioni.famiglienumerose.org/camiciamoci/',
                    desc:'Prodotti e accessori di abbigliamento, vendita online.',
                    benefits:['Sconto riservato ai soci ANFN con codice dedicato utilizzabile sullo shop online'],
                    how:'Inserire il codice riservato disponibile nell\'area soci (abramo.famiglienumerose.org) al momento dell\'acquisto'
                },
                {
                    name:'Fate e Folletti Boutique',
                    cat:'Abbigliamento cerimonia',
                    url:'https://convenzioni.famiglienumerose.org/fate-e-folletti-boutique/',
                    desc:'Abbigliamento, accessori e calzature per cerimonia — boutique online.',
                    benefits:['Sconto dedicato sui capi e accessori cerimonia con codice riservato ANFN'],
                    how:'Codice riservato disponibile nell\'area soci ANFN da inserire al momento dell\'acquisto'
                },
                {
                    name:'ArgentoDorato Editore',
                    cat:'Editoria',
                    url:'https://convenzioni.famiglienumerose.org/argentodorato-editore/',
                    desc:'Romanzi, saggistica e illustrati di editore italiano indipendente.',
                    benefits:['Condizioni di acquisto di favore su pubblicazioni di romanzi, saggistica e illustrati'],
                    how:'Contattare l\'editore comunicando l\'appartenenza ANFN con tessera 2026'
                },
            ]
        },
        {
            id:'retail', label:'Centri Commerciali & Retail', icon:'🏬',
            items:[
                {
                    name:'Tigotà',
                    cat:'Igiene, bellezza, casa',
                    url:'https://convenzioni.famiglienumerose.org/tigota/',
                    desc:'Oltre 700 store in Italia + shop online. Igiene persona, bellezza, prodotti per la casa e alimenti per animali.',
                    benefits:[
                        'Punti elettronici FideliTì MAGGIORATI ad ogni acquisto in store e online',
                        'Sconti selezionati secondo il listino convenzioni ANFN gennaio 2026',
                        'Codice riservato per acquisti online su tigotà.it',
                        'Esclusi: prodotti già in promozione e gift card. Non cumulabile con altri sconti'
                    ],
                    how:'In store: esibire tessera ANFN 2026 e Carta FideliTì. Online: inserire codice riservato dall\'area soci ANFN. Info: rnc@famiglienumerose.org'
                },
                {
                    name:'Pittarosso SPA',
                    cat:'Calzature e pelletteria',
                    url:'',
                    desc:'Oltre 240 punti vendita in Italia. Calzature donna, uomo, bambino, borse e pelletteria.',
                    benefits:['Condizioni di particolare favore sull\'acquisto di calzature e accessori in tutti i pdv'],
                    how:'Esibire tessera ANFN 2026 valida alla cassa'
                },
                {
                    name:'IDEXE\' (0–14 anni)',
                    cat:'Abbigliamento bambini',
                    url:'',
                    desc:'Abbigliamento bambini e ragazzi da 0 a 14 anni.',
                    benefits:['Sconti dedicati su tutta la collezione abbigliamento per bambini e ragazzi'],
                    how:'Esibire tessera ANFN 2026 in store'
                },
                {
                    name:'Supermercati OASI e TIGRE',
                    cat:'Spesa alimentare',
                    url:'',
                    desc:'Rete di supermercati e ipermercati distribuiti prevalentemente in Centro-Sud Italia.',
                    benefits:['Sconto del 10% sul totale della spesa (esclusi prodotti già in promozione)'],
                    how:'Presentare la tessera ANFN 2026 alla cassa al momento del pagamento'
                },
                {
                    name:'Coal Soc. Coop',
                    cat:'Distribuzione alimentare',
                    url:'',
                    desc:'Grande catena di distribuzione alimentare del Centro Italia, attiva dal 1960.',
                    benefits:['Condizioni agevolate per i soci ANFN nei punti vendita Coal del Centro Italia'],
                    how:'Esibire tessera ANFN 2026 al punto vendita Coal'
                },
                {
                    name:'Euronics Gruppo Siem',
                    cat:'Elettronica e grandi elettrodomestici',
                    url:'',
                    desc:'Grandi e piccoli elettrodomestici, elettronica di consumo.',
                    benefits:[
                        'Prezzi riservati su elettrodomestici e prodotti di elettronica',
                        'Richiesta Carta Euronics Star Club (sottoscrizione gratuita) + tessera ANFN'
                    ],
                    how:'Sottoscrivere gratuitamente la Carta Euronics Star Club + esibire tessera ANFN 2026 e documento di identità'
                },
                {
                    name:'Sapore di Mare',
                    cat:'Prodotti ittici',
                    url:'',
                    desc:'La più grande pescheria d\'Italia (dal 1992). Pesce fresco, congelato e surgelato.',
                    benefits:['Offerte e prezzi riservati ai soci ANFN su prodotti ittici selezionati (rete nazionale)'],
                    how:'Esibire tessera ANFN 2026 al punto vendita'
                },
                {
                    name:'Valore Sposi Atelier',
                    cat:'Moda matrimonio',
                    url:'https://convenzioni.famiglienumerose.org/valore-sposi-atelier/',
                    desc:'Abiti da sposa, sposo, cerimonia e accessori. Atelier specializzato.',
                    benefits:['Sconti su abiti e accessori per matrimoni e cerimonie nuziali'],
                    how:'Presentarsi all\'atelier con tessera ANFN 2026 valida'
                },
                {
                    name:'Viviparchi',
                    cat:'Parchi naturali',
                    url:'https://convenzioni.famiglienumerose.org/viviparchi/',
                    desc:'Card Viviparchi 2026: un\'unica card per famiglia per accedere ai parchi naturali aderenti.',
                    benefits:['Card Viviparchi 2026 a condizioni agevolate — un\'unica card per tutta la famiglia'],
                    how:'Acquistare la card Viviparchi tramite il portale ANFN con il codice riservato 2026 disponibile nell\'area soci'
                },
            ]
        },
        {
            id:'auto', label:'Automobili & Trasporti', icon:'🚗',
            items:[
                {
                    name:'Ford Carpoint – Auto nuove',
                    cat:'Auto nuove Ford',
                    url:'https://convenzioni.famiglienumerose.org/automobili-carousel/',
                    desc:'Concessionaria Carpoint Ford Store (Roma e area laziale). Consegne su tutto il territorio nazionale.',
                    benefits:[
                        'Sconto fino al 35% rispetto al listino ufficiale Ford',
                        'Buoni carburante in omaggio: da €300 a €800 (a seconda del modello acquistato)'
                    ],
                    how:'Recarsi nelle sedi Carpoint (Ford Store Pisana, Appia, Marconi, Pontina, Ostia, Pomezia, Dragona) con tessera ANFN 2026'
                },
                {
                    name:'Volkswagen Carpoint – Auto nuove',
                    cat:'Auto nuove VW',
                    url:'https://convenzioni.famiglienumerose.org/automobili-carousel/',
                    desc:'Concessionaria Carpoint Volkswagen (Roma e area laziale).',
                    benefits:[
                        'Sconto fino al 20% rispetto al listino ufficiale Volkswagen',
                        'Buoni carburante in omaggio: da €150 a €400 (a seconda del modello)'
                    ],
                    how:'Recarsi nelle sedi Carpoint VW con tessera ANFN 2026 in corso di validità'
                },
                {
                    name:'Usato Carpoint – Multimarca',
                    cat:'Auto usate garantite',
                    url:'https://convenzioni.famiglienumerose.org/automobili-carousel/',
                    desc:'Usato multimarca: km0, aziendali, DAS WeltAuto (VW Group), GPL, ibride e metano.',
                    benefits:[
                        'Usato garantito e certificato (DAS WeltAuto per VW Group)',
                        'OMAGGIO: primi 2 tagliandi dalla data di acquisto completamente gratuiti'
                    ],
                    how:'Recarsi in concessionaria Carpoint con tessera ANFN 2026'
                },
                {
                    name:'Service Carpoint – Officina Ford',
                    cat:'Ricambi e assistenza',
                    url:'https://convenzioni.famiglienumerose.org/automobili-carousel/',
                    desc:'Assistenza e ricambi originali Ford nelle sedi Carpoint di Roma.',
                    benefits:[
                        'Sconto 15% sui ricambi del tagliando',
                        'Sconto dal 15% al 25% su tutti gli altri ricambi Ford',
                        'Vettura sostitutiva GRATUITA durante la riparazione'
                    ],
                    how:'Prenotare il service presso una sede Carpoint con tessera ANFN 2026'
                },
                {
                    name:'Noleggio NLT – Carpoint',
                    cat:'Noleggio a lungo termine',
                    url:'https://convenzioni.famiglienumerose.org/automobili-carousel/',
                    desc:'Noleggio a lungo termine con consegna su tutto il territorio nazionale.',
                    benefits:[
                        'Canone mensile all-inclusive: immatricolazione, RCA, furto e kasko, infortuni conducente, soccorso stradale h24 e gestione multe già inclusi'
                    ],
                    how:'Contattare Carpoint con tessera ANFN 2026; consegna disponibile in tutta Italia'
                },
            ]
        },
        {
            id:'salute', label:'Salute & Benessere', icon:'💊',
            items:[
                {
                    name:'Cesare Pozzo – Mutuo Soccorso',
                    cat:'Sanità integrativa',
                    url:'https://convenzioni.famiglienumerose.org/societa-nazionale-di-mutuo-soccorso-cesare-pozzo/',
                    desc:'Società Nazionale di Mutuo Soccorso con oltre 250.000 mutualisti. Assistenza sanitaria integrativa.',
                    benefits:[
                        'Assistenza sanitaria integrativa a condizioni agevolate per i soci ANFN',
                        'Rimborso spese mediche, visite specialistiche, ricoveri e cure dentistiche a tariffe ridotte'
                    ],
                    how:'Contattare Cesare Pozzo comunicando l\'appartenenza ANFN per accedere alle condizioni riservate'
                },
                {
                    name:'Colosseum Dental Group',
                    cat:'Odontoiatria (rete nazionale)',
                    url:'https://convenzioni.famiglienumerose.org/miro/',
                    desc:'Il più grande gruppo odontoiatrico d\'Europa. Brand italiani: Mirò, Armonia Dentale, Dental First, Dentalcoop, Odontosalute.',
                    benefits:[
                        'Tariffe convenzionate ANFN su tutte le cure odontoiatriche: visite, igiene, otturazioni, protesi, implantologia, ortodonzia',
                        'Convenzione valida in TUTTI i centri della rete Colosseum Dental in Italia'
                    ],
                    how:'Prenotare in qualsiasi centro della rete (Mirò, Armonia, Dental First, Dentalcoop, Odontosalute) e comunicare l\'appartenenza ANFN con tessera 2026'
                },
                {
                    name:'Ottica Ciaramitaro',
                    cat:'Ottica (Palermo)',
                    url:'https://convenzioni.famiglienumerose.org/nuona-convenzione-con-lottica-ciaramitato-di-palermo/',
                    desc:'Ottica storica a Palermo.',
                    benefits:['Sconti riservati su occhiali da vista, montature, lenti e occhiali da sole'],
                    how:'Recarsi al negozio a Palermo con tessera ANFN 2026 valida'
                },
            ]
        },
        {
            id:'fiscale', label:'Servizi Fiscali & CAF', icon:'📋',
            items:[
                {
                    name:'CAF MCL Srl',
                    cat:'Assistenza fiscale nazionale',
                    url:'https://convenzioni.famiglienumerose.org/caf-mcl-srl/',
                    desc:'Assistenza fiscale a dipendenti e pensionati su tutto il territorio nazionale. Oltre 200 sportelli.',
                    benefits:[
                        'Tariffe agevolate per: 730, ISEE, successioni, contratti di locazione, IMU, bonus edilizi e altre pratiche',
                        'Rete capillare in oltre 200 comuni italiani'
                    ],
                    how:'Recarsi allo sportello CAF MCL più vicino con tessera ANFN 2026'
                },
                {
                    name:'CAF UGL Srl',
                    cat:'Assistenza fiscale',
                    url:'',
                    desc:'Servizi di assistenza fiscale attraverso la rete sindacale UGL.',
                    benefits:['Condizioni agevolate su dichiarazioni fiscali e pratiche ISEE per i soci ANFN'],
                    how:'Presentare tessera ANFN 2026 allo sportello CAF UGL'
                },
                {
                    name:'LUCI SRL / clip.it',
                    cat:'Bonus e monitoraggio fiscale',
                    url:'https://convenzioni.famiglienumerose.org/luci-srl-societa-benefit-www-clip-it/',
                    desc:'Servizi di monitoraggio bonus, CAF e Patronato. Società Benefit.',
                    benefits:[
                        'Monitoraggio e gestione attiva dei bonus spettanti alla famiglia',
                        'Supporto pratiche CAF e Patronato a condizioni agevolate'
                    ],
                    how:'Contattare LUCI SRL / clip.it comunicando l\'appartenenza ANFN con tessera 2026'
                },
            ]
        },
        {
            id:'legale', label:'Servizi Legali & Assicurativi', icon:'⚖️',
            items:[
                {
                    name:'ADICU aps',
                    cat:'Difesa consumatori',
                    url:'https://convenzioni.famiglienumerose.org/adicu-aps/',
                    desc:'Associazione a Difesa dei Consumatori e degli Utenti. Consulenza legale a 360°.',
                    benefits:[
                        'Consulenza legale a condizioni agevolate per consumatori e utenti',
                        'Assistenza su controversie con fornitori, banche, assicurazioni e Pubblica Amministrazione'
                    ],
                    how:'Contattare ADICU comunicando la qualità di socio ANFN con tessera 2026'
                },
                {
                    name:'Avv. Guarini Raffaele',
                    cat:'Diritto civile',
                    url:'https://convenzioni.famiglienumerose.org/avvocato-raffaele-guarini/',
                    desc:'Studio legale specializzato in diritto civile.',
                    benefits:['Assistenza e consulenza legale civilistica a condizioni di favore per i soci ANFN'],
                    how:'Contattare lo studio esibendo tessera ANFN 2026'
                },
                {
                    name:'PR Assicurazioni',
                    cat:'Assicurazioni',
                    url:'https://convenzioni.famiglienumerose.org/pr-assicurazioni/',
                    desc:'RC auto, tutela legale, previdenza, risparmio e RC professionali. Operativo dal 2017.',
                    benefits:['Condizioni agevolate e preventivi personalizzati su RC auto, tutela legale, previdenza, risparmio e RC professionali'],
                    how:'Contattare PR Assicurazioni con tessera ANFN 2026 per un preventivo personalizzato'
                },
                {
                    name:'Agenzia Rimini Serpieri (Generali)',
                    cat:'Assicurazioni Generali',
                    url:'https://convenzioni.famiglienumerose.org/agenzia-generale-di-rimini-serpieri/',
                    desc:'Agenzia del Gruppo Generali — polizze vita, casa, auto e salute.',
                    benefits:['Condizioni di favore sulle polizze Generali (vita, casa, auto, salute, infortuni) per i soci ANFN'],
                    how:'Contattare l\'agenzia Rimini Serpieri comunicando l\'appartenenza ANFN con tessera 2026'
                },
                {
                    name:'Studio 2 Esse S.R.L.',
                    cat:'Sovraindebitamento',
                    url:'https://convenzioni.famiglienumerose.org/studio-2-esse-s-r-l/',
                    desc:'Supporto legale alle famiglie in difficoltà economica per le procedure di sovraindebitamento.',
                    benefits:['Consulenza e assistenza per procedure di sovraindebitamento a condizioni agevolate per famiglie ANFN'],
                    how:'Contattare Studio 2 Esse comunicando l\'appartenenza ANFN con tessera 2026'
                },
            ]
        },
        {
            id:'utenze', label:'Utenze – Luce & Gas', icon:'⚡',
            items:[
                {
                    name:'Picchio Luce & Gas',
                    cat:'Energia domestica',
                    url:'https://convenzioni.famiglienumerose.org/picchio-lucegas/',
                    desc:'Fornitore di energia elettrica e gas naturale per utenze domestiche.',
                    benefits:[
                        'Offerta agevolata su fornitura di luce e gas dedicata ai soci ANFN',
                        'Tariffa riservata rispetto al mercato standard'
                    ],
                    how:'Contattare Picchio Luce & Gas comunicando l\'appartenenza ANFN con tessera 2026'
                },
                {
                    name:'Goldenergy (Gruppo Goldengas)',
                    cat:'Energia domestica',
                    url:'https://convenzioni.famiglienumerose.org/goldenergy-luce-gas/',
                    desc:'Operatore energetico dal 2013 (Senigallia). Fornitura luce e gas domestico.',
                    benefits:[
                        'Tariffe vantaggiose riservate alle famiglie numerose ANFN',
                        'Condizioni speciali su offerta combinata luce + gas'
                    ],
                    how:'Contattare Goldenergy citando la convenzione ANFN con tessera 2026'
                },
                {
                    name:'Duferco Energia SpA',
                    cat:'Energia domestica',
                    url:'https://convenzioni.famiglienumerose.org/duferco-energia-spa/',
                    desc:'Azienda energetica attiva anche nella produzione da fonti rinnovabili.',
                    benefits:[
                        'Prezzo vantaggioso su fornitura domestica luce e gas',
                        'Servizio dedicato alle esigenze delle famiglie numerose'
                    ],
                    how:'Attivare la fornitura con Duferco comunicando l\'appartenenza ANFN con tessera 2026'
                },
                {
                    name:'UNTC – Unione Naz. Tutela Consumatori',
                    cat:'Consulenza energia',
                    url:'https://convenzioni.famiglienumerose.org/unione-nazionale-tutela-consumatori/',
                    desc:'Supporto nella gestione dei contratti di fornitura energetica per il mercato libero e tutelato.',
                    benefits:[
                        'Consulenza nella scelta del fornitore energetico più conveniente',
                        'Tutela e assistenza per contratti luce e gas nel mercato libero e tutelato',
                        'Possibilità di diventare consulente UNTC per raccolta contratti'
                    ],
                    how:'Contattare UNTC con tessera ANFN 2026'
                },
            ]
        },
        {
            id:'istruzione', label:'Istruzione & Formazione', icon:'🎓',
            items:[
                {
                    name:'UnitelmaSapienza',
                    cat:'Università digitale',
                    url:'https://convenzioni.famiglienumerose.org/unitelmasapienza/',
                    desc:'Università degli Studi di Roma UnitelmaSapienza — ateneo telematico riconosciuto dal MUR.',
                    benefits:['Riduzione della retta universitaria per iscrizione a corsi di laurea triennale, magistrale e master online'],
                    how:'Contattare la segreteria di UnitelmaSapienza indicando l\'appartenenza ANFN con tessera 2026'
                },
                {
                    name:'Pontificia Università Lateranense',
                    cat:'Università pontificia',
                    url:'https://convenzioni.famiglienumerose.org/pontificia-universita-lateranense/',
                    desc:'Università ecclesiastica di Roma con corsi di teologia, filosofia, diritto canonico e scienze umane.',
                    benefits:['Riduzioni sulle rette per iscrizione a corsi e programmi post-laurea per i soci ANFN'],
                    how:'Contattare la segreteria della PUL con tessera ANFN 2026'
                },
                {
                    name:'EIPASS / Certipass',
                    cat:'Certificazioni digitali europee',
                    url:'https://convenzioni.famiglienumerose.org/eipass/',
                    desc:'Percorsi di certificazione delle competenze digitali riconosciuti in tutta Europa.',
                    benefits:[
                        'Accesso agevolato ai percorsi di certificazione digitale EIPASS',
                        'Riduzione sul costo degli esami di certificazione informatica'
                    ],
                    how:'Contattare Certipass / EIPASS comunicando l\'appartenenza ANFN con tessera 2026'
                },
                {
                    name:'WebHouseMessina',
                    cat:'Corsi online scuola',
                    url:'https://convenzioni.famiglienumerose.org/webhousemessina/',
                    desc:'Corsi MIM online per il mondo scuola e webinar formativi per docenti.',
                    benefits:['Condizioni agevolate su corsi online e webinar per il settore scolastico'],
                    how:'Contattare WebHouseMessina con tessera ANFN 2026'
                },
            ]
        },
        {
            id:'cultura', label:'Cultura, Media & Spettacolo', icon:'🎭',
            items:[
                {
                    name:'Avvenire – Abbonamento digitale',
                    cat:'Quotidiano',
                    url:'https://convenzioni.famiglienumerose.org/avvenire/',
                    desc:'Avvenire Nuova Editoriale Italiana — quotidiano nazionale di ispirazione cattolica.',
                    benefits:['Abbonamento in edizione digitale a condizioni agevolate riservate ai soci ANFN'],
                    how:'Sottoscrivere l\'abbonamento tramite il portale ANFN con il codice riservato disponibile nell\'area soci'
                },
                {
                    name:'UAO Spettacoli Srls',
                    cat:'Teatro e spettacoli',
                    url:'https://convenzioni.famiglienumerose.org/uao-spettacoli-srls/',
                    desc:'Impresa culturale creativa — produzioni e spettacoli teatrali per famiglie.',
                    benefits:['Condizioni agevolate su biglietti per spettacoli teatrali organizzati da UAO Spettacoli'],
                    how:'Contattare UAO Spettacoli comunicando l\'appartenenza ANFN con tessera 2026'
                },
            ]
        },
        {
            id:'sport', label:'Sport & Attività Fisiche', icon:'⚽',
            items:[
                {
                    name:'Associazione Italiana Arbitri (AIA – FIGC)',
                    cat:'Formazione sportiva',
                    url:'https://convenzioni.famiglienumerose.org/associazione-italiana-arbitri/',
                    desc:'Corsi di formazione arbitrale ufficiali FIGC attraverso l\'AIA. Percorso con abilitazione nazionale.',
                    benefits:[
                        'Corsi per diventare arbitro di calcio COMPLETAMENTE GRATUITI per ragazze e ragazzi dai 14 ai 35 anni',
                        'Percorso formativo con abilitazione ufficiale AIA valida su tutto il territorio nazionale'
                    ],
                    how:'Rivolgersi alla sezione AIA locale presentando la tessera ANFN 2026 del proprio familiare'
                },
            ]
        },
        {
            id:'vacanze', label:'Vacanze & Turismo', icon:'🏖️',
            items:[
                {
                    name:'Club del Sole',
                    cat:'Villaggi all\'aria aperta',
                    url:'https://convenzioni.famiglienumerose.org/club-del-sole/',
                    desc:'27 villaggi turistici in Italia: riviera romagnola, lidi ferraresi, Garda, Veneto, Marche, Abruzzo, Toscana, Versilia, Trentino, Bologna.',
                    benefits:[
                        'Sconto riservato tramite codice ANFN dedicato applicato automaticamente sul preventivo',
                        'Non cumulabile con altri codici promozionali'
                    ],
                    how:'Inserire il codice ANFN (dall\'area soci) sul sito Club del Sole oppure contattare il Booking Center (tel. 0543/24108) comunicando il codice sconto ANFN 2026'
                },
                {
                    name:'Gruppo Caroli Hotels',
                    cat:'Hotel Salento (Puglia)',
                    url:'https://convenzioni.famiglienumerose.org/gruppo-caroli/',
                    desc:'Hotel e resort del Salento: Gallipoli e Santa Maria di Leuca. Quarta generazione familiare.',
                    benefits:[
                        'Tariffe speciali per famiglie ANFN nelle strutture Caroli del Salento',
                        'Promozione SuperFamiglia (giugno): dal 5° figlio in poi, soggiorno GRATUITO'
                    ],
                    how:'Prenotare direttamente con i resort Caroli comunicando l\'appartenenza ANFN con tessera 2026'
                },
                {
                    name:'Happy Camp (Tour Operator)',
                    cat:'Case mobili e tende in villaggio',
                    url:'https://convenzioni.famiglienumerose.org/happy-camp/',
                    desc:'Case mobili e tende nei migliori villaggi in Italia e in Europa. Sardegna inclusa con traghetto.',
                    benefits:[
                        'Riduzione dal 5% al 30% rispetto ai prezzi da catalogo',
                        'Offerte speciali indicate nel listino convenzionato ANFN',
                        'In alcuni villaggi: 2 case mobili al prezzo di 1 per famiglie che superano la capacità di una singola unità',
                        'Per la Sardegna: prezzo comprensivo di traghetto con compagnia navale convenzionata'
                    ],
                    how:'Mostrare tessera ANFN 2026 valida al momento della prenotazione o del check-in'
                },
                {
                    name:'Trinity ViaggiStudio Srl',
                    cat:'Vacanze studio all\'estero',
                    url:'https://convenzioni.famiglienumerose.org/trinity-viaggistudio-srl/',
                    desc:'Vacanze studio all\'estero, anno scolastico all\'estero e programmi internazionali per ragazzi.',
                    benefits:['Condizioni di favore su programmi di studio e vacanze linguistiche all\'estero'],
                    how:'Contattare Trinity ViaggiStudio con tessera ANFN 2026'
                },
                {
                    name:'Lesgo USA Srl',
                    cat:'College estivi USA',
                    url:'https://convenzioni.famiglienumerose.org/lesgo-usa-srl/',
                    desc:'Vacanza studio sportiva in college americani per ragazze e ragazzi delle scuole superiori.',
                    benefits:['Prezzi agevolati per i soci ANFN sui programmi college USA (lingua + sport)'],
                    how:'Contattare Lesgo USA con tessera ANFN 2026'
                },
                {
                    name:'English Sport Camp',
                    cat:'Camp estivi in Italia',
                    url:'https://convenzioni.famiglienumerose.org/divertimento-e-sport-asd-english-sport-camp/',
                    desc:'Camp estivi linguistico-sportivi organizzati in Italia dall\'ASD Divertimento e Sport.',
                    benefits:['Tariffe agevolate per i soci ANFN sui camp estivi linguistici e sportivi'],
                    how:'Contattare l\'ASD con tessera ANFN 2026'
                },
                {
                    name:'Dinosauri in Carne e Ossa',
                    cat:'Mostre itineranti',
                    url:'https://convenzioni.famiglienumerose.org/dinosauri-in-carne-e-ossa/',
                    desc:'Mostra Extinction (Gubbio) e Life – Dino in Carne e Ossa. Mostre itineranti sui dinosauri.',
                    benefits:['Biglietti a prezzo scontato per i soci ANFN alle mostre itineranti'],
                    how:'Presentare tessera ANFN 2026 all\'ingresso della mostra'
                },
            ]
        },
        {
            id:'welfare', label:'Welfare & Supporto Familiare', icon:'🤝',
            items:[
                {
                    name:'Asso Cral (Soc. Cooperativa)',
                    cat:'Welfare aziendale e familiare',
                    url:'https://convenzioni.famiglienumerose.org/asso-cral/',
                    desc:'Cooperativa con servizi dedicati al welfare familiare e al mondo del lavoro.',
                    benefits:[
                        'Accesso a servizi dedicati al welfare familiare e lavorativo',
                        'Supporto a dipendenti e famiglie per accesso a benefit e agevolazioni'
                    ],
                    how:'Contattare Asso Cral con tessera ANFN 2026'
                },
                {
                    name:'Copylandia di Simona Di Domenico',
                    cat:'Tipografia',
                    url:'https://convenzioni.famiglienumerose.org/22468-2/',
                    desc:'Stampa e rilegatura professionale di tesi di laurea, partecipazioni e materiale tipografico.',
                    benefits:['Prezzi convenzionati per i soci ANFN su stampa e rilegatura tesi, partecipazioni e altro'],
                    how:'Contattare Copylandia comunicando l\'appartenenza ANFN con tessera 2026'
                },
            ]
        },
    ];

    /* ─────────────────────────────────────────────
       DATASET — CONVENZIONI REGIONALI
       Fonte: PDF ufficiale ANFN (28 settembre 2023)
       ───────────────────────────────────────────── */
    const REGIONAL = [
        { id:'abruzzo', label:'Abruzzo 🐻', count:38, cats:[
            {cat:'Alimentari (OASI / TIGRE / Conad)',items:['Avezzano, L\'Aquila, Giulianova, Roseto, Teramo, Martinsicuro, Vasto, Lanciano, Francavilla, Pescara, Chieti, Isernia — sconto 10% sulla spesa con tessera ANFN']},
            {cat:'Servizi CAF-MCL',items:['Avezzano, L\'Aquila, Lanciano, Chieti, Ortona, Montesilvano, Pescara, Alba Adriatica, Teramo — tariffe agevolate su 730 / ISEE / successioni']},
            {cat:'Salute',items:['Pescara — Studio dentistico Zona Ernesto (tariffe conv.)','Montesilvano — ASD IRIS e Parafarmacia Farma&bio','Pescara — MICSO SRL (utenze casa)']},
            {cat:'Automotive',items:['Montesilvano — Evangelista Gomme (pneumatici, prezzi convenzionati)']},
            {cat:'Tempo libero',items:['Rocca San Giovanni (CH) — Zoo d\'Abruzzo (biglietti ridotti)','Tortoreto Lido (TE) — Acquapark OndaBlu (ingresso scontato)','Teramo — Camping Stork']},
            {cat:'Altro',items:['Città Sant\'Angelo (PE) — XERA Distribution WEEKO (elettronica, telefonia)','Pescara — Associazione FAVIVA (consulenze)']},
        ]},
        { id:'basilicata', label:'Basilicata 🗿', count:3, cats:[
            {cat:'Servizi CAF-MCL',items:['Matera (MT), Potenza (MT e PZ) — tariffe agevolate per pratiche fiscali e ISEE']},
        ]},
        { id:'calabria', label:'Calabria 🌶️', count:32, cats:[
            {cat:'Servizi CAF-MCL',items:['Castrovillari, Cosenza, Mangone, Mottafollone, Rende, Torano Castello (CS), Catanzaro Lido, Lamezia Terme (CZ), Crotone (KR), Campo Calabro, Palmi, Reggio Calabria, Rizziconi, Taurianova (RC), Ricadi, Vibo Valentia (VV) — tariffe agevolate']},
            {cat:'Salute & Ottica',items:['Reggio Calabria — Studio Dentistico Campolo (tariffe conv.)','Reggio Calabria — Nuova Ottica Reggina + Superottica Pelligra','Melito Porto Salvo — L\'Ottico di Fiducia 2','Bovalino, Gioia Tauro, Melito, Reggio Calabria — CLIVIA PROFUMI (prodotti persona)']},
            {cat:'Alimentari',items:['Gallico (RC) — DAF S.a.s. alimentari locali','Siderno (RC) — Az. Agr. Barranca (prodotti tipici)']},
            {cat:'Acquisti',items:['Reggio Calabria — BRICO SERVICE SRL (fai da te)','Reggio Calabria — SPORT IN (abbigliamento sportivo)','Reggio Calabria — Cinema Multisala Lumiere (biglietti ridotti)']},
            {cat:'Vacanze',items:['Cosenza (CS) — Camping Thurium','Sellia Marina (CZ) — Hotel Apulia','Bova Marina (RC) — Villaggio Turistico La Perla Jonica']},
        ]},
        { id:'campania', label:'Campania 🍕', count:38, cats:[
            {cat:'Servizi CAF-MCL',items:['Benevento, Foiano, Solopaca (BN), Caserta (CE), oltre 15 comuni dell\'area Napoli (NA), Angri, Battipaglia, Capaccio, Castel S.Giorgio, Mercato S.Severino, Nocera, Pagani, Pisciotta, Polla, Sala Consilina, Salerno, Sarno, Siano (SA) — tariffe agevolate']},
            {cat:'Alimentari',items:['Gragnano (NA) — Pastificio D\'Aniello (pasta artigianale, prezzi convenzionati)']},
            {cat:'Vacanze',items:['Salerno (SA) — Camping Paestum','Salerno — Dipark (parco giochi)','Pimonte (NA) — Sant\'Angelo Resort & SPA','Santa Maria a Vico (CE) — Hotel Antica Quercia']},
            {cat:'Servizi vari',items:['Napoli — Studio legale Mazzarella (consulenza legale)','Pimonte (NA) — GANIMEDE STUDY (agenzia viaggi)','Pimonte — PAIDEIA SRL (formazione)']},
        ]},
        { id:'emilia', label:'Emilia Romagna 🍝', count:50, cats:[
            {cat:'Odontoiatria (DentalCoop/Colosseum)',items:['Bologna, Cesena, Carpi, Modena, Ravenna, Reggio Emilia, Rimini — tariffe convenzionate ANFN su tutti i trattamenti']},
            {cat:'Alimentari (Sapore di Mare)',items:['Bologna (2 pdv), Cesena, Ferrara, Carpi, Fidenza, Parma, Reggio Emilia — prezzi riservati su prodotti ittici']},
            {cat:'Servizi CAF-MCL',items:['Bologna, Faenza, Ravenna, Reggio Emilia, Parma, Piacenza, Rimini — tariffe agevolate']},
            {cat:'Vacanze',items:['Cesenatico — AERAT case vacanza (2 strutture)','Ferrara — Camping Vigna Sul Mar','Pinarella di Cervia — Hotel Santa Maria','Rimini — Camping Internazionale Riccione','Misano Adriatico — 5 hotel (Arno, Baltic, Silvia, Touring, HOY Hotels Group)','Cattolica — Hotel Ariston','Forlì — GLI ARCANGELI (spettacoli)']},
            {cat:'Convenzioni Piacenza (10 pdv locali)',items:['Acrobatic Fitness, autolavaggio Chiofalo, abbigliamento (5 pdv), autoscuola, ottica, odontoiatria, orafo, pizzeria, azienda bio — tutti a tariffe convenzionate ANFN']},
            {cat:'Alimentari tipici',items:['Borgo Val di Taro (PR) — Az. Agr. Querzola Bio','Campegine (RE) — Caseificio Milanello']},
        ]},
        { id:'friuli', label:'Friuli Venezia Giulia 🏔️', count:40, cats:[
            {cat:'Alimentari (Salvador Formaggi e altri)',items:['Aviano, Maniago, Sacile, Sequals, Spilimbergo, Pieve di Soligo, Mortegliano, Portogruaro — formaggi e latticini tipici a prezzi riservati','Monfalcone (GO) — Cooperativa Pescatori (pesce fresco)','Porcia (PN) — Sapore di Mare','Trieste — Sapore di Mare + FATTO IN CASA alimentari','San Quirino (PN) — la mela che si beve (succhi biologici)','Tavagnacco — Salumificio Zoratti + Az. Agr. Casarotto']},
            {cat:'Odontoiatria (DentalCoop)',items:['Fontanafredda, Spilimbergo (PN) — tariffe ANFN convenzionate']},
            {cat:'Servizi CAF-MCL',items:['Gorizia (GO), Reana del Rojale (UD), Trieste (TS), Udine (UD) — tariffe agevolate']},
            {cat:'Vacanze',items:['Gorizia — Camping Marina Julia + Camping Tenuta Primero','Duino-Aurisina (TS) — Camping Village Mare Pineta','Lignano (UD) — Bella Italia & EFA Village','Forni Avoltri (UD) — Bella Italia Piani di Luzza','Tarvisio (UD) — Casa Marta']},
            {cat:'Sport e tempo libero',items:['Trieste — Autoscuola Re Artù','Duino (TS) — Trieste Adventure Park','Chiusaforte (UD) — Parco Avventura Sella Nevea','Pordenone — 2 scuole (Don Bosco, Istituto Vendramini)']},
        ]},
        { id:'lazio', label:'Lazio 🏛️', count:40, cats:[
            {cat:'Automobili Carpoint (Roma e hinterland)',items:['Ford Store Pisana, Appia, Marconi, Pontina, Ostia (Roma), Pomezia, Dragona — sconti 20-35% su auto nuove + ricambi + noleggio NLT']},
            {cat:'Alimentari (TIGRE)',items:['Ciampino, Fonte Nuova, Roma — Supermercati TIGRE — sconto 10% sulla spesa']},
            {cat:'Servizi CAF-MCL',items:['Albano Laziale, Anzio, Castel Gandolfo, Fiumicino, Ladispoli, Marino, Pomezia, Roma, San Cesareo (RM), Aquino, Piglio (FR), Cisterna di Latina, Minturno (LT), Rieti (RI) — tariffe agevolate']},
            {cat:'Vacanze',items:['Roma — Real Village camping, Camping Capitol','Viterbo (VT) — Camping California']},
            {cat:'Servizi professionali Roma',items:['Groupama Assicurazioni, Avv. Ingratta, Studio Carfa, Studio Legale De Caria, Dr.ssa Lovergine, For Edil Costruzioni — tutti a condizioni agevolate per soci ANFN']},
            {cat:'Salute Roma',items:['Studio odontoiatrico Calderini (tariffe conv.)','Libreria EFESTO (sconti soci)','DANZARMONIA ACADEMY (danza, tariffe agevolate)','A Casa Simpatia Guest House (ospitalità, tariffe ridotte)']},
        ]},
        { id:'liguria', label:'Liguria ⛵', count:7, cats:[
            {cat:'Servizi CAF-MCL',items:['Cogoleto, Genova (GE), La Spezia, San Terenzo di Lerici (SP), Loano, Savona (SV) — tariffe agevolate su 730 e ISEE']},
            {cat:'Vacanze',items:['Rapallo (GE) — casa vacanza (condizioni agevolate)']},
        ]},
        { id:'lombardia', label:'Lombardia 🏭', count:78, cats:[
            {cat:'Alimentari (Sapore di Mare — 30+ pdv)',items:['Tortona (AL), Bergamo, Dalmine, Rogno, Treviglio (BG), Biella, Brescia, Capriolo, Rovato (BS), Appiano Gentile, Cantù, Grandate (CO), Crema (CR), Barzanò (LC), Lodi (LO), Busnago (MB), Milano e hinterland (8 pdv), Pavia, Voghera (PV), Busto Arsizio (VA) — prezzi riservati su pesce']},
            {cat:'Odontoiatria (DentalCoop e altri)',items:['Cremona, Mantova — DentalCoop (tariffe ANFN conv.)','Offanengo (CR) — Studio dentistico Corotti','Bergamo — Ambulatorio Bernini, Politerapica Seriate','Brescia — Medical Udito, NDP Montichiari','Lissone (MB) — Studio odontoiatrico Gagliano']},
            {cat:'Servizi CAF-MCL',items:['Oltre 20 sportelli in provincia di BG, BS, CR, MB, MI, MN, PV, VA — tariffe agevolate']},
            {cat:'Salute & Ottica',items:['Bergamo — EUROPE MEDICA','Brescia — Ottica Belleri, Farmacia Zadei','Calcinato (BS) — Ottica Donatini','Milano — Centro Ieled, Ottica Cenisio, Ottica Strozzi']},
            {cat:'Vacanze e tempo libero',items:['San Felice del Benaco (BS) — Concept Village Piccola Gardiola (camping Garda)','Concorezzo (MB) — Acquaworld (parco acquatico)','Iseo (BS) — GERIS SRL ristorante']},
            {cat:'Altro',items:['Brescia — Autoscuola Nuova Marotti, Liceo Gianni Brera','Milano — Onoranze Funebri Milano Oltre','Rho (MI) — Dr.ssa Alessia Arturi (assicurazioni)']},
        ]},
        { id:'marche', label:'Marche ⚓', count:49, cats:[
            {cat:'Alimentari (OASI / TIGRE / Conad)',items:['Ascoli P., Fermo, Porto S.Giorgio, Castelbellino, Castelfidardo, Ancona, Jesi, Loreto, Macerata, Matelica, Tolentino — sconto 10% + Conad Ascoli']},
            {cat:'Alimentari tipici locali',items:['Loreto (AN) — La Bottega della Frutta Casali','Ascoli Piceno — Oleificio Angelini (olio EVO)','Corridonia e Montecassiano (MC) — Sapore di Mare','Pedaso (FM) — Terra Fageto','Sant\'Elpidio (FM) — Molino Orsili (farine)','Angelo Recchi Apicultura (miele locale)']},
            {cat:'Servizi CAF-MCL',items:['Arquata, Ascoli, Castel di Lama, Castignano (AP), Fermo, Monte Urano (FM), Macerata, Tolentino (MC), Pesaro (PU) — tariffe agevolate']},
            {cat:'Salute',items:['Macerata — Odontosalute (Colosseum Dental, tariffe conv.)','Numana (AN) — Lympho Care','Fermo — Farmacia Comunale, Studio Oculistico Tallei','Macerata — Studio Oculistico Tallei']},
            {cat:'Assicurazioni e varie',items:['Ancona, Osimo Stazione — Esposito Assicurazioni sas','Ancona — Gonfiabili Ancona (noleggio)','Macerata — SPACCIO PANNOLINI, MAC BEAUTY SALON, Tesoromio (abbigliamento)','Recanati — Controvento aps (tempo libero)']},
        ]},
        { id:'molise', label:'Molise 🌾', count:11, cats:[
            {cat:'Alimentari (OASI / TIGRE)',items:['Campobasso e Termoli — sconto 10% sulla spesa con tessera ANFN']},
            {cat:'Alimentari tipici',items:['Campobasso — Macelleria Natilli','Termoli — Pizzeria Re Pomodoro']},
            {cat:'Servizi CAF-MCL',items:['Campobasso (CB) — tariffe agevolate su 730 e ISEE']},
            {cat:'Ristorazione',items:['Campobasso — Dolce Stil Novo + Pizzeria Metropolitan — condizioni di favore']},
            {cat:'Salute e altro',items:['Campobasso — Studio Pantaleone (cure mediche, tariffe conv.)','Guglionesi (CB) — Gioielleria Schiassi','Termoli — BAHIA AZZURRA (vacanze)']},
        ]},
        { id:'piemonte', label:'Piemonte 🍷', count:22, cats:[
            {cat:'Alimentari (Sapore di Mare)',items:['Asti, Alba, Bra, Cuneo, Mondovì, Galliate (NO), Burolo, Nichelino, Settimo Torinese, Torino, Vercelli — prezzi riservati su prodotti ittici']},
            {cat:'Prodotti agricoli tipici',items:['Peveragno (CN) — Allevamenti Besimauda (carni e prodotti zootecnici locali)']},
            {cat:'Servizi CAF-MCL',items:['Asti (AT), Cuneo (CN), Novara (NO), Nichelino, Torino (TO), Verbania (VB) — tariffe agevolate']},
            {cat:'Salute',items:['Torino — Studio di Psicologia (tariffe conv.)','Vercelli — Dott.ssa Chiara Lorenzetti psicologa (tariffe conv.)']},
            {cat:'Shopping e tecnologia',items:['Vicolungo (NO) — THE STYLE OUTLETS (outlet abbigliamento, sconti aggiuntivi ANFN)','San Benigno Canavese (TO) — DV POINT SRL (elettronica, prezzi conv.)']},
        ]},
        { id:'puglia', label:'Puglia 🫒', count:30, cats:[
            {cat:'Servizi CAF-MCL',items:['Bari, Bitonto, Molfetta, Sammichele, Trani, Turi (BA), Andria (BAT), Brindisi (BR), Foggia, Lucera (FG), Lecce, Monteroni di Lecce (LE), Avetrana, Taranto (TA) — tariffe agevolate']},
            {cat:'Vacanze Salento (Gallipoli / Leuca)',items:['Gallipoli — Bellavista Club (Caroli Hotels), Ecoresort Le Sirenè, Joli Park Hotel','Santa Maria di Leuca — Hotel Terminal, Villa La Meridiana','Ostuni (BR) — MAPO VILLAGE PLAIA hotel']},
            {cat:'Vacanze Gargano',items:['Foggia — Camping Centro Turistico San Nicola, Camping Internazionale, Camping Manacore','Lecce — Camping La Masseria, Camping Torre Rinalda']},
            {cat:'Alimentari e prodotti tipici',items:['Molfetta (BA) — Cooperativa Terra di Olivi (olio EVO pugliese, prezzi conv.)','Barletta (BAT) — Cantina Sociale di Barletta (vini, prezzi conv.)']},
            {cat:'Scuola e altro',items:['Bitonto (BA) — Aurora Fellows (formazione, tariffe agevolate)','Foggia — RD s.r.l. (libri e cancelleria, sconti)']},
        ]},
        { id:'sardegna', label:'Sardegna 🌊', count:40, cats:[
            {cat:'Vacanze Cala Gonone e Dorgali (NU) — appartamenti',items:['13 strutture tra appartamenti e case vacanza a prezzi convenzionati per famiglie ANFN: Iris 1 e 2, La Meridiana, Mare e Monte, Riva al Mare, Fresia, Angelo, Gianfranco, Ipomea, Marzia e Gabri, Pietro, Villetta Stella, Le Vigne, Piredda Icoré, Casa del Balivo']},
            {cat:'Vacanze camping e villaggi',items:['Aglientu (OT) — Camping Village Baia Blu La Tortuga','Cannigione (OT) — Centro Vacanze Isuledda','Palau (OT) — Camping Village Capo D\'Orso','Alghero (SS) — Camping Village Laguna Blu','Oristano (OR) — Camping Bella Sardini','Nuoro — Camping Iscrixedda + Camping L\'Ultima Spiaggia','Carbonia-Iglesias — Camping Tonnara']},
            {cat:'Servizi CAF-MCL',items:['Cagliari (CA), Isili (CA), Oristano (OR), Sassari (SS) — tariffe agevolate']},
            {cat:'Salute',items:['Quartu Sant\'Elena (CA) — Medic4 (cure mediche)','Selargius (CA) — Centro Medico i Mulin','Monserrato (CA) — Pielle Centro Ottica','Alghero (SS) — Alghero Medical Center']},
            {cat:'Automotive',items:['Sassari — CONFALONIERI CITROEN + CONFALONIERI RENAULT DACIA (concessionarie conv.)','Cagliari — Autoscuola Moderna']},
            {cat:'Alimentari e varie',items:['Ittiri (SS) — LAIT Latteria Ittiri Coop (latticini locali)','Muravera (SU) — Il Fornaio Schirru (pane artigianale)','Cagliari — Libreria Cocco, Studio Legale Tatti, DETTAGLI DI ROBERTA giocattoli','Quartucciu — CAR WASH Cocco (autolavaggio)']},
        ]},
        { id:'sicilia', label:'Sicilia 🌋', count:40, cats:[
            {cat:'Servizi CAF-MCL (capillari su tutta l\'isola)',items:['Agrigento, Favara, Lampedusa, Naro, Sciacca (AG), Caltanissetta (CL), Acireale, Catania, Mascalucia, Mineo, Paternò (CT), Enna (EN), Capo d\'Orlando, Messina, Rometta (ME), Bagheria, Ciminna, Palermo × 2 (PA), Modica, Pozzallo (RG), Augusta, Melilli, Siracusa, Solarino (SR), Castelvetrano, Erice, Marsala, Santa Ninfa (TP) — tariffe agevolate']},
            {cat:'Alimentari tipici',items:['Ribera (AG) — Az. Agr. Ganduscio (agrumi e prodotti locali)','Francofonte (SR) — Riggio Arance (arance di qualità)','Palermo — DLB Bros alimentari']},
            {cat:'Vacanze',items:['Trapani — Camping El Bahir','Alcamo (TP) — Benedetta Stellino appartamenti','Palermo — Palermo Mare Holidays + Giusino 55 appartamenti']},
            {cat:'Salute e shopping',items:['Palermo — VISION OTTICA ACCARDI (ottica, sconti)','Vittoria (RG) — CAPRICCI abbigliamento','Erice (TP) — MAURO SPITALERI (casa e giardino)']},
        ]},
        { id:'toscana', label:'Toscana 🏺', count:20, cats:[
            {cat:'Servizi CAF-MCL',items:['Arezzo (AR), Firenze (FI), Livorno (LI), Lucca, Pietrasanta (LU), Montignoso (MS), Cascina, Pisa, S.Giuliano Terme (PI), Prato (PO), Pistoia (PT) — tariffe agevolate']},
            {cat:'Odontoiatria (DentalCoop)',items:['Firenze — DentalCoop (tariffe ANFN convenzionate)']},
            {cat:'Vacanze camping',items:['Firenze — Camping Norcenni','Grosseto — Camping Orbetello + SISTEMA SRL villaggi (Principina a Mare)','Livorno — Camping Free Beach + Free Time + Park Albatros']},
            {cat:'Case vacanza',items:['Fornovolasco (LU) — Cooperativa Odissea','Massa (MS) — Casa per Ferie Sacro Cuore']},
        ]},
        { id:'trentino', label:'Trentino-Alto Adige 🏔️', count:38, cats:[
            {cat:'Alimentari tipici locali',items:['Bolzano — Sapore di Mare, PAN SURGELATI','Moena (TN) — COOP MOENA MACELLERIA','Trento — Federazione Prov. Allevatori + Sapore di Mare','Ville di Fiemme — Caseificio Val di Fiemme Cavalese','Ziano di Fiemme — Pane & Dolci','Riva del Garda — MILKY ICE','Pergine Valsugana — DON DIEGO GELATI','Segno di Taio — CONSORZIO MELINDA (mele)']},
            {cat:'Casa e arredo (TORGGLER & DOLOMITI MATERASSI)',items:['Bolzano, Marlengo, Silandro, Ziano di Fiemme — TORGGLER (prodotti casa)','Belluno, Feltre, Fiera di Primiero — DOLOMITI MATERASSI']},
            {cat:'Salute & Ottica',items:['Bolzano e Laives — Ottica Leitner (2 pdv)','Predazzo (TN) — Tonini Patrizio Ottica','Trento — Ottica Romani Due','Merano (BZ) — Studio Medico Zanarotti','Stenico (TN) — TERME DI COMANO (benessere, tariffe conv.)']},
            {cat:'Vacanze',items:['Pietralba (BZ) — Malga Monte San Pietro (hotel)','Dobbiaco (BZ) — Casa Mons. Baldelli','San Vigilio di Marebbe (BZ) — Casa Teresa Martin','Cavalese (TN) — Hotel Lagorai Resort & SPA','San Martino di Castrozza (TN) — Excelsior Hotel Cimone']},
            {cat:'Noleggio e servizi',items:['Arco, Isera, Trento (TN) — ITALNOLO noleggio attrezzature','Predazzo — Studio Legale Avv. Dellasega','Rovereto — Studio Borghetti']},
        ]},
        { id:'umbria', label:'Umbria 🌿', count:24, cats:[
            {cat:'Alimentari (OASI / TIGRE)',items:['Assisi, Foligno, Perugia, Spoleto (PG) — sconto 10% sulla spesa con tessera ANFN']},
            {cat:'Alimentari tipici',items:['Perugia — Sapore di Mare (prodotti ittici, prezzi riservati)']},
            {cat:'Servizi CAF-MCL',items:['Perugia e Spoleto (PG), Terni (TR) — tariffe agevolate su 730 e ISEE']},
            {cat:'Salute e Benessere',items:['Perugia — DentalCoop (tariffe conv.)','Ellera di Corciano — Studio dentistico Passetti','Perugia — Dott.ssa Isabella Balducci (ambulatorio)','Torgiano (PG) — Studio Lince Agnese','San Marco (PG) — Ottica Sorcetti (ottica, sconti)','Perugia — Estetica Glam Up (tariffe conv.)','Laboratorio Analisi Cliniche GALENO']},
            {cat:'Sport e palestre',items:['Castel del Piano + Ponte della Pietra (PG) — ASD PEGASO (palestre, tariffe agevolate)','Magione (PG) — APD Magione Rugby (tariffe agevolate)']},
            {cat:'Scuola e cultura',items:['Perugia — IL PENTAGRAMMA (scuola musica, agevolazioni)','Ferro di Cavallo (PG) — Il Cerchio cartolibreria','Perugia — NUOVA LIBRERIA XX GIUGNO (sconti)']},
            {cat:'Servizi professionali',items:['Ellera di Corciano — AURES DI VASELLI PAOLO (consulenza)','Perugia — Saioni Immobiliare, Studio Legale Lucidi-Tosti']},
            {cat:'Vacanze e agriturismi',items:['Montefalco (PG) — Dimora la Quercia di Palombi','Gualdo Cattaneo (PG) — Villa Mari Nature & Rest Farm']},
        ]},
        { id:'valdaosta', label:'Valle d\'Aosta ⛷️', count:2, cats:[
            {cat:'Vacanze',items:['Champorcher (AO) — Casa per Ferie Verana (soggiorno montagna, tariffe conv.)']},
            {cat:'Alimentari',items:['Saint Christophe (AO) — Sapore di Mare (prodotti ittici, prezzi riservati)']},
        ]},
        { id:'veneto', label:'Veneto 🏛️', count:80, cats:[
            {cat:'Odontoiatria (DentalCoop — rete molto densa)',items:['Sedico (BL), Padova (PD), Castelfranco, Mogliano, Montebelluna, Spresiano, Treviso × 2 (TV), Mirano, San Donà, Venezia (VE), Schio (VI), Verona — tariffe conv. ANFN su tutte le cure']},
            {cat:'Alimentari (Sapore di Mare)',items:['Ponte nelle Alpi (BL), Mestre e Portogruaro (VE), Thiene, Torri di Quartesolo, Vicenza (VI), Verona e Villafranca (VR) — prezzi riservati su prodotti ittici']},
            {cat:'Alimentari (Salvador Formaggi)',items:['Pieve di Soligo, San Vendemmiano, Vittorio Veneto (TV), Portogruaro (VE) — formaggi tipici, prezzi convenzionati']},
            {cat:'Servizi CAF-MCL',items:['Gazzo Padovano, Padova, Piove di Sacco (PD), Badia Polesine, Rovigo (RO), Mestre, San Donà di Piave (VE), Vicenza (VI), Bovolone, Cerea, Roverchiara, Verona (VR) — tariffe agevolate']},
            {cat:'Vacanze camping (Venezia e Garda)',items:['Venezia — 8 campeggi (Ca\'Savio, Italy, Laguna Village, Marina di Venezia, Residence Village, S.Francesco, Jesolo Mare, Cavallino Village)','Rovigo — Camping Village Rosa Pinet','Verona — Camping Bella Italia, Butterfly, Cisano/San Vito (Lago di Garda)','Venezia — Hotel Antico Capon + SINTESI SRL appartamenti']},
            {cat:'Parchi e tempo libero',items:['Bosco Chiesanuova (VR) — BOSCOPARK Parco Avventura','Villafranca di Verona — Gardafarm parco','Vicenza — ACROPARK parco avventura','Malcesine (VR) — Funivia Monte Baldo (biglietti agevolati)']},
            {cat:'Salute & Ottica',items:['Domegge di Cadore (BL) — Ottica Blu Coral','Codognè (TV) — Spaccio Occhiali Vision','Conegliano (TV) — Studio Scarpa','Thiene (VI) — Studio Dentistico Balestro','Marano Vicentino (VI) — Studio edu.co']},
            {cat:'Servizi e altro',items:['Vicenza — Studio Cecchetto-Dalla Rosa (consulenza)','Verona — Saponificio Chizzoni (prodotti cura persona)','S.Giovanni Lupatoto (VR) — BM Brunelli Idraulica','Mestre (VE) — ACLI SERVICE (consulenza)','Veneto — compariamoci.it (comparazione utenze)']},
        ]},
    ];

    /* ─────────────────────────────────────────────
       STATO APPLICAZIONE
       ───────────────────────────────────────────── */
    let currentScope = 'naz';

    /* ─────────────────────────────────────────────
       RENDERING — ALBERO SIDEBAR
       ───────────────────────────────────────────── */
    function buildNazTree() {
        const el = document.getElementById('anfnTreeNaz');
        if (!el) return;
        el.innerHTML = NATIONAL.map(sec => `
            <div class="anfn-tree-group">
              <div class="anfn-group-hdr" onclick="anfn.toggleGroup(this)" role="button" tabindex="0">
                <span>${sec.icon}</span>
                <span style="flex:1">${sec.label}</span>
                <span class="g-count">${sec.items.length}</span>
                <span class="g-arrow">▶</span>
              </div>
              <div class="anfn-tree-items">
                ${sec.items.map(item => `
                  <div class="anfn-tree-item"
                       role="button" tabindex="0"
                       onclick="anfn.showNational('${esc(sec.id)}','${esc(item.name)}')"
                       onkeydown="if(event.key==='Enter')anfn.showNational('${esc(sec.id)}','${esc(item.name)}')">
                    <span class="scope-dot" style="background:var(--nat)"></span>
                    ${item.name}
                  </div>`).join('')}
              </div>
            </div>`).join('');
    }

    function buildRegTree() {
        const el = document.getElementById('anfnTreeReg');
        if (!el) return;
        el.innerHTML = REGIONAL.map(reg => `
            <div class="anfn-tree-group">
              <div class="anfn-group-hdr" onclick="anfn.toggleGroup(this)" role="button" tabindex="0">
                <span style="flex:1">${reg.label}</span>
                <span class="g-count">${reg.count}</span>
                <span class="g-arrow">▶</span>
              </div>
              <div class="anfn-tree-items">
                <div class="anfn-tree-item"
                     role="button" tabindex="0"
                     onclick="anfn.showRegional('${esc(reg.id)}')"
                     onkeydown="if(event.key==='Enter')anfn.showRegional('${esc(reg.id)}')">
                  <span class="scope-dot" style="background:var(--reg)"></span>
                  Tutte le convenzioni (${reg.count})
                </div>
              </div>
            </div>`).join('');
    }

    function toggleGroup(hdr) {
        hdr.classList.toggle('open');
        hdr.nextElementSibling.classList.toggle('open');
    }

    /* ─────────────────────────────────────────────
       RENDERING — PANNELLO PRINCIPALE
       ───────────────────────────────────────────── */
    function welcome() {
        return `<div class="anfn-welcome">
          <div class="anfn-welcome-headline">Navigatore Convenzioni ANFN 2026</div>
          <div class="anfn-welcome-sub">
            Seleziona una categoria nel menu a sinistra per scoprire i vantaggi riservati
            alle famiglie associate con tessera ANFN 2026 valida.
          </div>
          <div class="anfn-welcome-steps">
            <div class="anfn-welcome-step">
              <div class="step-num">1</div>
              <span>Scegli <strong>Nazionali</strong> (valide ovunque in Italia)
                    o <strong>Regionali</strong> (per la tua zona)</span>
            </div>
            <div class="anfn-welcome-step">
              <div class="step-num">2</div>
              <span>Apri un settore nel menu e seleziona la convenzione</span>
            </div>
            <div class="anfn-welcome-step">
              <div class="step-num">3</div>
              <span>Leggi i <strong>vantaggi riservati</strong> e come esibire la tessera</span>
            </div>
          </div>
        </div>`;
    }

    function showNational(secId, itemName) {
        const sec  = NATIONAL.find(s => s.id === secId);
        const item = sec && sec.items.find(i => i.name === itemName);
        if (!item) return;
        setActive(itemName);
        closeMobileSidebar();

        setMain(`<div class="anfn-conv-panel">
          <div class="anfn-conv-hdr">
            <div class="anfn-breadcrumb">${sec.icon} ${sec.label}</div>
            <div class="anfn-conv-title">${item.name}</div>
            <div><span class="anfn-scope-badge nat">🇮🇹 CONVENZIONE NAZIONALE &bull; Valida in tutta Italia</span></div>
          </div>

          <div class="anfn-benefit-block">
            <div class="anfn-benefit-label">✦ Vantaggi riservati ai soci ANFN con tessera 2026</div>
            ${item.benefits.map(b => `
              <div class="anfn-benefit-item">
                <span class="anfn-bullet">→</span><span>${b}</span>
              </div>`).join('')}
          </div>

          <div class="anfn-info-block">
            <div class="anfn-info-label">Descrizione</div>
            <p class="anfn-info-text">${item.desc}</p>
          </div>

          <div class="anfn-info-block">
            <div class="anfn-info-label">Come ottenere il vantaggio</div>
            <p class="anfn-info-text">${item.how}</p>
          </div>

          <div class="anfn-chip-row">
            <div class="anfn-chip"><strong>Settore:</strong> ${item.cat}</div>
            <div class="anfn-chip"><strong>Copertura:</strong> Nazionale</div>
            ${item.url
              ? `<div class="anfn-chip"><a href="${item.url}" target="_blank" rel="noopener">🔗 Scheda sul portale ANFN</a></div>`
              : ''}
          </div>

          <div class="anfn-tessera-note">
            🪪 È obbligatoria la <strong>tessera ANFN 2026 in corso di validità</strong>.
            Esibire fisicamente in store oppure usare il codice riservato dall\'area soci:
            <a href="https://abramo.famiglienumerose.org/area-famiglia" target="_blank" rel="noopener">
              abramo.famiglienumerose.org
            </a>
          </div>
        </div>`);
    }

    function showRegional(regId) {
        const reg = REGIONAL.find(r => r.id === regId);
        if (!reg) return;
        setActive(regId);
        closeMobileSidebar();

        setMain(`<div class="anfn-conv-panel">
          <div class="anfn-conv-hdr">
            <div class="anfn-breadcrumb">📍 Convenzioni Regionali</div>
            <div class="anfn-conv-title">${reg.label}</div>
            <span class="anfn-scope-badge reg">📍 REGIONALE &bull; ${reg.count} punti di erogazione</span>
          </div>

          <div class="anfn-region-intro">
            Presenta la <strong>tessera ANFN 2026 valida</strong> in cassa o alla reception per ottenere il vantaggio.
            <strong>Dati:</strong> PDF ufficiale ANFN (settembre 2023) — per aggiornamenti:
            <a href="https://convenzioni.famiglienumerose.org" target="_blank" rel="noopener">
              convenzioni.famiglienumerose.org
            </a>
          </div>

          ${reg.cats.map(c => `
            <div class="anfn-conv-card open">
              <div class="anfn-card-hdr" onclick="this.parentElement.classList.toggle('open')">
                <div class="anfn-card-name">${c.cat}</div>
                <span class="anfn-card-chevron">▼</span>
              </div>
              <div class="anfn-card-body">
                ${c.items.map(item => `
                  <div class="anfn-benefit-item" style="margin-bottom:8px;font-size:13px;line-height:1.6">
                    <span class="anfn-bullet" style="color:var(--reg)">→</span>
                    <span>${item}</span>
                  </div>`).join('')}
                <div class="anfn-tessera-note" style="margin-top:10px">
                  🪪 Esibire la <strong>tessera ANFN 2026</strong> in corso di validità
                </div>
              </div>
            </div>`).join('')}
        </div>`);
    }

    /* ─────────────────────────────────────────────
       RICERCA
       ───────────────────────────────────────────── */
    function search(q) {
        if (!q) { setMain(welcome()); return; }
        q = q.toLowerCase();

        const results = [];
        NATIONAL.forEach(sec => {
            sec.items.forEach(item => {
                if ( item.name.toLowerCase().includes(q)    ||
                     item.cat.toLowerCase().includes(q)     ||
                     item.desc.toLowerCase().includes(q)    ||
                     sec.label.toLowerCase().includes(q)    ||
                     item.benefits.some(b => b.toLowerCase().includes(q)) ) {
                    results.push({ type:'naz', sec, item });
                }
            });
        });
        REGIONAL.forEach(reg => {
            if (reg.label.toLowerCase().includes(q)) {
                results.push({ type:'reg', reg });
                return;
            }
            reg.cats.forEach(c => {
                if (c.cat.toLowerCase().includes(q) ||
                    c.items.some(i => i.toLowerCase().includes(q))) {
                    results.push({ type:'reg-cat', reg, cat:c });
                }
            });
        });

        // deduplication
        const seen = new Set();
        const uniq = results.filter(r => {
            const k = r.type + (r.item ? r.item.name : r.reg ? r.reg.id : '');
            if (seen.has(k)) return false;
            seen.add(k); return true;
        });

        if (uniq.length === 0) {
            setMain(`<div class="anfn-search-results">
              <div class="anfn-no-results">Nessun risultato per "<strong>${q}</strong>"</div>
            </div>`);
            return;
        }

        setMain(`<div class="anfn-search-results">
          <div class="anfn-search-title">🔍 ${uniq.length} risultati per "${q}"</div>
          ${uniq.slice(0, 40).map(r => {
            if (r.type === 'naz') return `
              <div class="anfn-result-card"
                   onclick="anfn.setScope('naz');anfn.showNational('${esc(r.sec.id)}','${esc(r.item.name)}')">
                <div class="anfn-result-hdr">
                  <span class="scope-dot" style="background:var(--nat)"></span>
                  <div class="anfn-result-name">${r.item.name}</div>
                  <span class="anfn-result-tag">${r.sec.icon} ${r.sec.label}</span>
                  <span class="anfn-result-tag" style="background:var(--nat-light);color:var(--nat)">Nazionale</span>
                </div>
                <div class="anfn-result-preview">${r.item.benefits[0]}</div>
              </div>`;
            if (r.type === 'reg') return `
              <div class="anfn-result-card"
                   onclick="anfn.setScope('reg');anfn.showRegional('${esc(r.reg.id)}')">
                <div class="anfn-result-hdr">
                  <span class="scope-dot" style="background:var(--reg)"></span>
                  <div class="anfn-result-name">${r.reg.label}</div>
                  <span class="anfn-result-tag" style="background:var(--reg-light);color:var(--reg)">${r.reg.count} convenzioni</span>
                </div>
              </div>`;
            return '';
          }).join('')}
        </div>`);
    }

    /* ─────────────────────────────────────────────
       HELPERS
       ───────────────────────────────────────────── */
    function setScope(scope) {
        currentScope = scope;
        document.getElementById('anfnTreeNaz').style.display = scope==='naz' ? '' : 'none';
        document.getElementById('anfnTreeReg').style.display = scope==='reg' ? '' : 'none';
        const btnN = document.getElementById('btnNaz');
        const btnR = document.getElementById('btnReg');
        btnN.className = 'anfn-scope-btn' + (scope==='naz' ? ' active' : '');
        btnR.className = 'anfn-scope-btn' + (scope==='reg' ? ' active reg' : '');
        btnN.setAttribute('aria-pressed', scope==='naz');
        btnR.setAttribute('aria-pressed', scope==='reg');
        setMain(welcome());
        document.querySelectorAll('.anfn-tree-item').forEach(el => el.classList.remove('active'));
    }

    function setMain(html) {
        const el = document.getElementById('anfnMain');
        if (el) { el.innerHTML = html; el.scrollTop = 0; }
    }

    function setActive(key) {
        document.querySelectorAll('.anfn-tree-item').forEach(el => {
            el.classList.remove('active','reg');
            const oc = el.getAttribute('onclick') || '';
            if (oc.includes(key)) {
                el.classList.add('active');
                if (currentScope === 'reg') el.classList.add('reg');
            }
        });
    }

    function closeMobileSidebar() {
        const sb = document.getElementById('anfnSidebar');
        if (sb) sb.classList.remove('open');
    }

    function esc(str) {
        return str.replace(/\\/g,'\\\\').replace(/'/g,"\\'").replace(/"/g,'&quot;');
    }

    /* ─────────────────────────────────────────────
       INIT
       ───────────────────────────────────────────── */
    function init() {
        buildNazTree();
        buildRegTree();
        setMain(welcome());

        // Ricerca
        const searchEl = document.getElementById('anfnSearch');
        if (searchEl) {
            let timer;
            searchEl.addEventListener('input', function() {
                clearTimeout(timer);
                timer = setTimeout(() => search(this.value.trim()), 250);
            });
        }

        // Toggle mobile
        const mobileBtn = document.getElementById('anfnMobileToggle');
        const sidebar   = document.getElementById('anfnSidebar');
        if (mobileBtn && sidebar) {
            mobileBtn.addEventListener('click', () => {
                sidebar.classList.toggle('open');
            });
        }
    }

    // Espone API pubblica
    return { init, setScope, showNational, showRegional, toggleGroup, search };

})();

// Avvia dopo il caricamento del DOM
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', anfn.init);
} else {
    anfn.init();
}
</script>

</body>
</html>
<?php
/* Fine template: page-navigatore-anfn.php */
