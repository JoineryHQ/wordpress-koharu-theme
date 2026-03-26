<?php get_header(); ?>
<style type="text/css">
  .swatches {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 12px;
  }
  .swatch {
    text-align: center;
  }
  .dot {
    width: 54px;
    height: 54px;
    border-radius: 999px;
    margin: 0 auto 8px;
    border: 1px solid rgba(31, 44, 44, 0.10);
  }
</style>

<main class="site-main">  
  <div class="container brand-guide">

    <h1>Koharu Theme: Style Guide</h1>
    <h2>Color Palette</h2>
    <h3>Primary</h3>
    <div class="swatches">
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-dark-cyan)"></div>
        <p class="name">Dark Cyan</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-pine-blue)"></div>
        <p class="name">Pine Blue</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-muted-teal)"></div>
        <p class="name">Muted Teal</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-jasmine)"></div>
        <p class="name">Jasmine</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-old-lace)"></div>
        <p class="name">Old Lace</p>
      </div>

      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-flag-red)"></div>
        <p class="name">Flag Red</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-dark-charcoal)"></div>
        <p class="name">Dark Charcoal</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-jet-black)"></div>
        <p class="name">Jet Black</p>
      </div>
    </div>
    <h3>Light</h3>
    <div class="swatches">
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-dark-cyan-light)"></div>
        <p class="name">Dark Cyan Light</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-pine-blue-light)"></div>
        <p class="name">Pine Blue Light</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-muted-teal-light)"></div>
        <p class="name">Muted Teal Light</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-jasmine-light)"></div>
        <p class="name">Jasmine Light</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-old-lace-light)"></div>
        <p class="name">Old Lace Light</p>
      </div>

      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-flag-red-light)"></div>
        <p class="name">Flag Red Light</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-dark-charcoal-light)"></div>
        <p class="name">Dark Charcoal Light</p>
      </div>
      <div class="swatch">
        <div class="dot" style="background: var(--koharu-color-jet-black-light)"></div>
        <p class="name">Jet Black Light</p>
      </div>
    </div>
    <h2>Heading Styles</h2>
    <h1>Heading 1</h1>
    <h2>Heading 2</h2>
    <h3>Heading 3</h3>
    <h4>Heading 4</h4>
    <h5>Heading 5</h5>
    <h6>Heading 6</h6>
    <h2>Special Styles</h2>
    <h3>Checkbox lists:</h3>
    <ul class="checkbox-list">
      <li>Bullet list as checkboxes</li>
      <li>To get this look: Specify the "Checkbox List" format</li>
    </ul>
    <h3>Action card lists:</h3>
    <ol class="action-card-list">
      <li>Ordered list as cards</li>
      <li>To get this look:</li>
      <li>Specify the "Action card list" format.</li>
    </ol>
    <h3>Horizontal line:</h3>

    <hr />

    <h3>Button styles:</h3>
    Buttons are simply links with the appropriate format selection:
    <p>
    <a class="button-cta-red" href="https://example.com">"CTA Button Red"</a>
    </p><p>
    <a class="button-cta-cyan" href="https://example.com">"CTA Button Cyan"</a>
    </p><p>
    <a class="button-cta-jasmine" href="https://example.com">"CTA Button Jasmine"</a>
    </p><p>
    <a class="button-cta-transparent" href="https://example.com">"CTA Button Light"</a>
    </p>
    &nbsp;
  </div>
</main>
<?php get_footer(); ?>