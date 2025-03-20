<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="<?= base_url('dashboard_user') ?>"><i class="fa fa-caret-left"></i>kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Film Berdasarkan Negara: <?= isset($nama_negara) ? htmlspecialchars($nama_negara) : "Semua" ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <!-- <div class="btn__all">
                                <a href="<?= base_url('film') ?>" class="primary-btn">Tampilkan Semua <span class="arrow_right"></span></a>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <?php if (!empty($film)): ?>
                            <?php foreach ($film as $f): ?>
                                <div class="col-lg-3 col-md-5 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="<?= htmlspecialchars($f->gambar_film) ?>">
                                            <div class="ep">Durasi: <?= htmlspecialchars($f->durasi) ?></div>
                                        </div>
                                        <div class="product__item__text">
                                            <h5><a href="<?= base_url('detail_list/' . $f->id_film) ?>"><?= htmlspecialchars($f->nama_film) ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted text-center w-100">Tidak ada film yang ditemukan dalam genre ini.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .product__item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        cursor: pointer;
    }

    .product__item:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .product__item__pic {
        position: relative;
        height: 300px;
        border-radius: 10px;
        overflow: hidden;
        background-size: cover;
        background-position: center;
    }

    .product__item__pic .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        font-size: 18px;
        transition: opacity 0.3s ease-in-out;
    }

    .product__item__pic:hover .overlay {
        opacity: 1;
    }

    .product__item__text {
        padding: 10px;
        text-align: center;
        font-weight: bold;
    }

    .no-film-message {
        text-align: center;
        width: 100%;
        padding: 50px 0;
        font-size: 18px;
    }
</style>