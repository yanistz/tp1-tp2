<?php
$headTitle = "Accueil";
ob_start();
?>

  <section class="main-sections">
    <article class="main-articles">
      <h1 class="main-articles-title">
        Bienvenue sur Blog Voyage
      </h1>
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero laborum id quam illum cum deleniti velit obcaecati possimus blanditiis repellendus, earum quae, perspiciatis corrupti eius dolores laudantium deserunt quaerat. Qui cumque vero voluptas quae nihil dolorem dignissimos ratione itaque eum, debitis nobis sit provident dolore necessitatibus veritatis impedit ea perferendis?
      </p>
    </article>
  </section>

<?php
$mainContent = ob_get_clean();