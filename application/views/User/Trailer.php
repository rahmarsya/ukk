<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="<?= base_url('dashboard_user/detail/' . $film->id_film) ?>"><i class="fa fa-caret-left"></i>kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
function convertToEmbed($url)
{
    if (strpos($url, 'watch?v=') !== false) {
        return str_replace('watch?v=', 'embed/', $url);
    }
    if (strpos($url, 'youtu.be/') !== false) {
        return str_replace('youtu.be/', 'www.youtube.com/embed/', $url);
    }
    return $url;
}
?>



<div class="container">
    <h2 class="text-center mt-4">Trailer <?= htmlspecialchars($film->nama_film) ?></h2>
    <div class="trailer-container text-center">
        <iframe src="<?= convertToEmbed(htmlspecialchars($film->thriller)) ?>" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<style>
    body {
        background-color: #0a0a23;
        color: white;
        text-align: center;
    }

    .trailer-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2);
    }

    iframe {
        width: 100%;
        height: 500px;
        /* Ukuran lebih besar */
        border-radius: 5px;
    }

    h2 {
        margin-bottom: 20px;
        font-size: 28px;
        font-weight: bold;
        color: antiquewhite;
    }
</style>