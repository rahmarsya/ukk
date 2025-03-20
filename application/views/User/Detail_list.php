<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="<?= base_url('list_film') ?>"><i class="fa fa-caret-left"></i>kembali</a>
                    <!-- <a href="./categories.html">Categories</a>
                    <span>Romance</span> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="<?= htmlspecialchars($detail_film->gambar_film) ?>">
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3><?= htmlspecialchars($detail_film->nama_film) ?></h3>
                        </div>

                        <!-- Form Beri Rating (Tanpa Tombol Submit) -->
                        <?php if ($this->session->userdata('id_user')) : ?>
                            <form id="rating-form">
                                <input type="hidden" name="id_film" value="<?= $detail_film->id_film ?>">
                                <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">

                                <div class="star-rating">
                                    <input type="radio" name="rating" value="5" id="star5"><label for="star5"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="rating" value="4" id="star4"><label for="star4"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="rating" value="3" id="star3"><label for="star3"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="rating" value="2" id="star2"><label for="star2"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="rating" value="1" id="star1"><label for="star1"><i class="fa fa-star"></i></label>
                                </div>
                            </form>
                        <?php else : ?>
                            <p>Silakan login untuk memberi rating.</p>
                        <?php endif; ?>

                        <!-- Tempat Menampilkan Update Rating -->
                        <p class="rating-container">
                            <span id="rating-stars" class="rating-stars">
                                <?php
                                $rating = isset($rating_data->rata_rata) ? round($rating_data->rata_rata) : 0;
                                for ($i = 1; $i <= 5; $i++) {
                                    echo $i <= $rating ? '⭐' : '☆';
                                }
                                ?>
                            </span>
                            <br>
                            <span id="rating-average" class="rating-average">
                                <?= isset($rating_data->rata_rata) ? number_format($rating_data->rata_rata, 1) : "Belum ada rating"; ?>
                            </span>/5
                            <br>
                            <small><span id="rating-count" class="rating-count">
                                    <?= isset($rating_data->jumlah_rating) ? $rating_data->jumlah_rating : 0; ?>
                                </span> orang telah memberikan rating</small>
                        </p>

                        <!-- CSS Styling -->
                        <style>
                            .star-rating {
                                display: flex;
                                flex-direction: row-reverse;
                                justify-content: center;
                                font-size: 2rem;
                                color: #ccc;
                            }

                            .star-rating input {
                                display: none;
                            }

                            .star-rating label {
                                cursor: pointer;
                                transition: color 0.3s ease-in-out, transform 0.2s;
                            }

                            .star-rating label i {
                                transition: transform 0.2s;
                            }

                            /* Hover effect */
                            .star-rating label:hover,
                            .star-rating label:hover~label {
                                color: #ffcc00;
                                transform: scale(1.2);
                            }

                            /* Selected stars */
                            .star-rating input:checked~label {
                                color: #ffcc00;
                            }

                            /* Rating Display */
                            .rating-container {
                                text-align: center;
                                margin-top: 10px;
                            }

                            .rating-container .rating-stars {
                                font-size: 2rem;
                                color: #ffcc00;
                            }

                            .rating-container .rating-average {
                                font-size: 1.2rem;
                                font-weight: bold;
                                color: #333;
                            }

                            .rating-container .rating-count {
                                font-size: 1rem;
                                color: #777;
                            }
                        </style>

                        <p><?= htmlspecialchars($detail_film->deskripsi) ?></p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Tahun:</span> <?= htmlspecialchars($detail_film->tahun_rilis) ?></li>
                                        <li><span>Genre:</span> <?= htmlspecialchars($detail_film->nama_genre) ?></li>
                                        <li><span>Negara:</span> <?= htmlspecialchars($detail_film->nama_negara) ?></li>
                                        <li><span>Durasi:</span> <?= htmlspecialchars($detail_film->durasi) ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="anime__details__btn">
                            <a href="<?= htmlspecialchars($detail_film->thriller) ?>" class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tampilkan Komentar -->
            <div class="anime__details__review">
                <div class="section-title">
                    <h5>Reviews</h5>
                </div>

                <?php if (!empty($komentar) && is_array($komentar)) : ?>
                    <?php foreach ($komentar as $k) : ?>
                        <div class="anime__review__item">
                            <div class="anime__review__item__text">
                                <h6><?= $k->nama ?> - <span><?= date('d M Y H:i', strtotime($k->created_at)) ?></span></h6>
                                <p><?= nl2br(htmlspecialchars($k->komentar)) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Belum ada komentar. Jadilah yang pertama!</p>
                <?php endif; ?>
            </div>


            <!-- Form Tambah Komentar -->
            <div class="anime__details__form">
                <div class="section-title">
                    <h5>Your Comment</h5>
                </div>

                <?php if ($this->session->userdata('id_user')) : ?>
                    <form action="<?= site_url('komentar/add') ?>" method="post">
                        <input type="hidden" name="id_film" value="<?= $detail_film->id_film ?>">
                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                        <textarea name="komentar" placeholder="Your Comment" required></textarea>
                        <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                    </form>
                <?php else : ?>
                    <p>Silakan login untuk memberikan komentar.</p>
                <?php endif; ?>
            </div>


        </div>
    </div>
</section>
<!-- Anime Section End -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".star-rating input").click(function() {
            let rating = $(this).val(); // Ambil nilai rating yang dipilih
            let id_film = $("input[name='id_film']").val();
            let id_user = $("input[name='id_user']").val();

            $.ajax({
                url: "<?= site_url('rating/rate_ajax') ?>", // URL Controller untuk proses rating
                type: "POST",
                data: {
                    rating: rating,
                    id_film: id_film,
                    id_user: id_user
                },
                success: function(response) {
                    let data = JSON.parse(response);
                    if (data.status == "success") {
                        // Update tampilan rating secara langsung
                        $("#rating-stars").html(data.new_stars);
                        $("#rating-average").text(data.new_avg);
                        $("#rating-count").text(data.new_count);
                    } else {
                        alert("Gagal memberi rating!");
                    }
                }
            });
        });
    });
</script>