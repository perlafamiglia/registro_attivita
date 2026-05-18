# ANFN – Navigatore Convenzioni 2026
## Template WordPress · Guida all'installazione

---

## Contenuto del pacchetto

```
anfn-wp-template/
└── page-navigatore-anfn.php   ← unico file da caricare
└── ISTRUZIONI.md              ← questo file
```

---

## Installazione in 4 passi

### Passo 1 — Carica il file sul server

Accedi al tuo server via **FTP** (es. FileZilla) o tramite il
**File Manager** del pannello di controllo hosting (cPanel, Plesk, ecc.)
e carica `page-navigatore-anfn.php` nella cartella del tema attivo:

```
/wp-content/themes/NOME-DEL-TUO-TEMA/page-navigatore-anfn.php
```

> **Nota:** sostituisci `NOME-DEL-TUO-TEMA` con il nome effettivo
> del tema attivato su WordPress. Puoi verificarlo andando su
> WordPress → Aspetto → Temi.

Temi consigliati (testati e compatibili):
- **Astra** → `/wp-content/themes/astra/`
- **GeneratePress** → `/wp-content/themes/generatepress/`
- **Hello Elementor** → `/wp-content/themes/hello-elementor/`
- **OceanWP** → `/wp-content/themes/oceanwp/`

---

### Passo 2 — Crea la pagina in WordPress

1. Accedi al pannello di amministrazione WordPress
2. Vai su **Pagine → Aggiungi nuova**
3. Inserisci il titolo, ad esempio: `Navigatore Convenzioni ANFN 2026`
4. Nella colonna destra, individua il riquadro **Attributi pagina**
5. Nel menu a tendina **Template**, seleziona:
   `ANFN – Navigatore Convenzioni 2026`
6. Lascia vuoto il corpo della pagina (il contenuto è nel template)
7. Clicca **Pubblica**

> Se non vedi il riquadro "Attributi pagina", vai su
> **Opzioni schermo** (in alto a destra) e spunta la voce.

---

### Passo 3 — Aggiungi la pagina al menu (opzionale)

1. Vai su **Aspetto → Menu**
2. Seleziona la pagina appena creata
3. Clicca **Aggiungi al menu**
4. Salva il menu

---

### Passo 4 — Verifica il funzionamento

Visita la pagina pubblicata. Dovresti vedere:
- La barra superiore ANFN con il nome del tuo sito
- La barra di ricerca
- La sidebar con i settori nazionali e regionali
- Il pannello principale con la schermata di benvenuto

---

## Personalizzazioni consigliate

### Cambiare il nome/logo nella top bar

Nel file PHP, cerca questo blocco (~riga 175):
```php
<a href="..." class="anfn-logo">
    ANFN <em>Convenzioni</em>
</a>
```
Sostituisci il testo con il nome della tua associazione o sezione locale.

---

### Aggiungere/aggiornare una convenzione nazionale

Nel file PHP, nel blocco JavaScript, trova l'array `NATIONAL`.
Ogni convenzione ha questa struttura:

```javascript
{
    name:     'Nome Azienda',
    cat:      'Categoria',
    url:      'https://link-alla-scheda-anfn/',
    desc:     'Descrizione breve dell\'azienda e del servizio.',
    benefits: [
        'Primo vantaggio per i soci ANFN',
        'Secondo vantaggio (se presente)',
    ],
    how:      'Istruzioni su come ottenere lo sconto con la tessera.'
}
```

Copia una voce esistente, modificala e aggiungila all'array
del settore corrispondente.

---

### Aggiungere un nuovo settore nazionale

Aggiungi un nuovo oggetto all'array `NATIONAL`:

```javascript
{
    id:    'mio-settore',
    label: 'Nome Settore',
    icon:  '🏷️',
    items: [
        // inserisci le convenzioni qui
    ]
}
```

---

### Aggiornare le convenzioni regionali

Trova l'array `REGIONAL` e individua la regione da aggiornare.
Ogni regione ha questa struttura:

```javascript
{
    id:    'lombardia',
    label: 'Lombardia 🏭',
    count: 78,
    cats:  [
        {
            cat:   'Nome categoria',
            items: ['Descrizione punto 1', 'Descrizione punto 2']
        }
    ]
}
```

Aggiorna `count` e `cats` con i dati più recenti.

---

## Compatibilità

| Componente        | Versione minima |
|-------------------|-----------------|
| WordPress         | 5.8+            |
| PHP               | 7.4+            |
| Browser           | Chrome 90+, Firefox 88+, Safari 14+, Edge 90+ |

Il template è **autonomo**: non dipende da plugin, shortcode o
builder come Elementor / Divi / WPBakery. Funziona con qualsiasi tema.

---

## Risoluzione problemi

**Il template non appare nel menu a tendina**
→ Verifica che il file sia nella cartella giusta del tema attivo.
→ Il commento iniziale del file deve essere intatto (non modificarlo).

**La pagina mostra l'header/footer del tema**
→ Il CSS include regole per nasconderli. Se il tuo tema usa classi
  custom non standard, aggiungi il selettore CSS corretto nella
  sezione `/* Nasconde header/footer... */` del template.

**La barra wp-admin occupa spazio**
→ Gestita automaticamente: `body.admin-bar #anfn-root` riduce
  l'altezza di 32px (o 46px su mobile).

**Caratteri o font non caricati**
→ Verifica che il server abbia accesso a `fonts.googleapis.com`.
  In alternativa, scarica i font Libre Baskerville e Karla e
  caricali localmente nel tema.

---

## Aggiornamento dati convenzioni

Le convenzioni nazionali sono aggiornate al **maggio 2026**
(portale convenzioni.famiglienumerose.org).

Le convenzioni regionali sono estratte dal **PDF ufficiale ANFN
del 28 settembre 2023**. Per aggiornamenti, consultare:
- Portale: https://convenzioni.famiglienumerose.org
- Email:   convenzioni@famiglienumerose.org

---

*Template sviluppato per ANFN – Associazione Nazionale Famiglie Numerose*
