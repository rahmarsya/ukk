<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="<?= base_url('assets2/img/hero/hero-4.jpg') ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <h2>Moana 2</h2>
                            <p></p>
                            <a href="https://www.youtube.com/embed/hDZ7y8RP5HE?si=-VXUCLz600ug05FF" target="_blank">
                                <span>Watch Now</span> <i class="fa fa-angle-right"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="https://i.pinimg.com/736x/47/8c/f6/478cf6b82b5b2dce78febeea29624698.jpg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <h2>Frozen II</h2>
                            <p></p>
                            <a href="https://www.youtube.com/embed/Zi4LMpSDccc?si=_AqVMp1e8oBOKLQa" target="_blank">
                                <span>Watch Now</span> <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="https://i.pinimg.com/736x/50/09/2c/50092c80e9de561e3eb6867f25ea4e6b.jpg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <h2>The Sea Beast</h2>
                            <p></p>
                            <a href="https://www.youtube.com/embed/P-E-IGQCsPo?si=hj92PtIFvDz5MMC-" target="_blank">
                                <span>Watch Now</span> <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4></h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($detail_film as $film): ?>
                            <div class="col-lg-3 col-md-5 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?= htmlspecialchars($film->gambar_film) ?>">
                                        <div class="ep"> <?= htmlspecialchars($film->durasi) ?> </div>
                                        <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> 9141</div> -->
                                    </div>
                                    <div class="product__item__text">
                                        <!-- <ul>
                                            <li> <?= htmlspecialchars($detail_film->nama_genre) ?></li>
                                            <li> <?= htmlspecialchars($detail_film->tahun_rilis) ?></li>
                                        </ul> -->
                                        <h5><a href="<?= base_url('dashboard_user/detail/' . $film->id_film); ?>"><?= htmlspecialchars($film->nama_film) ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
</style>

<!-- Product Section End -->