<article id="section-styling">
    <h1>Styling</h1>

    <section id="section-styling-sheet">
        <h2>Custom Stylesheet</h2>
        <p>Aegaeon has its own css stylesheet and basic theme. If you deploy it as your corporate login solution, you probably
            want to mimic your other websites and override aegaeon look and feel.
        </p>
        <p>To have your own css stylesheet included in all pages, add the following key/value to your tomcat context :</p>
        <p class="code-block">
            &lt;Environment name="aegaeon.info.customStyleSheet" type="java.lang.String" value="https://your_domain/assets/css/style.css" /&gt;
        </p>
        <p>Change <i>your_domain</i> and make sure you use https or you may get a mixed content warning.</p>
    </section>

    <section id="section-styling-element">
        <h2>Element's styling</h2>
        Soon...
    </section>

</article>