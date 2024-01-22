<?php $__env->startSection('title'); ?> Hakkımızda <?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>

<section class="about-page">
    <div class="container">
        <div class="d-flex align-items-center flex-column">
            <div class="about-content">
                <div class="about-title">
                    Hakkımızda
                </div>
                <div class="about-slogan">
                    Kaliteye Odaklanmak<br>
                    Gözalıcı Tasarımlar
                </div>
                <div class="about-text">
                    Yaratıcı ve tutkulu gelinlik modelleri tasarlıyoruz.<br>
                    Moda dünyasında edindiğimiz deneyim ve sanatsal vizyonumuzla, özel anlarınızı unutulmaz kılacak gelinlikler tasarlamak için buradayız. Her gelin adayının benzersizliğini vurgulayan özel tasarımlarımız, zarafet ve modern estetiği bir araya getiriyor.<br><br>

                    Müşterilerimiz ile işbirliği yaparak, hayalinizdeki gelinliği gerçeğe dönüştürmek için özenle çalışıyoruz. Kaliteli kumaşlar, özel dikiş detayları ve benzersiz aksesuarlarla, size özel bir gelinlik deneyimi sunmayı hedefliyoruz. Tarzınıza uygun, sizi en iyi yansıtan ve özel gününüzde kendinizi özel hissettiren tasarımlarız, her detayın titizlikle düşünüldüğü özel eserlerdir.
                </div>
            </div>
        </div>
    </div>


    <!--About Image-->
    <div class="container w-75" style="margin-top: 4rem;">
        <div class="row">
            <div class="col-md-6">
                <div class="about-image">
                    <img src="https://july.uxper.co/fashion04/wp-content/uploads/sites/5/2022/04/unsplash_-uHVRvDr7pg.jpg">
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-image">
                    <img src="https://july.uxper.co/fashion04/wp-content/uploads/sites/5/2022/04/unsplash_kfSjyxAWhEc.jpg">
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 5rem;">
        <div class="about-title text-center" style="letter-spacing: 1px;">
            Kalite Sözümüz
        </div>
        <div class="about-slogan text-center">
            İhtiyacınız olan gelinlik modellerini<br> tasarlıyoruz...
        </div>
    </div>

    <div class="container w-75 mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="about-feature-title">
                    Estetik Tasarım
                </div>
                <div class="about-feature-content">
                    Müşterilerimizin talepleri doğrultusunda estetik gelinlik tasarımları meydana getiriyoruz.
                </div>
            </div>

            <div class="col-lg-4 border-start border-end">
                <div class="about-feature-title">
                    Konfor & Kalite
                </div>
                <div class="about-feature-content">
                    Gelinlik modellerimizde müşterilerimizin rahatlığını da düşünüyoruz. Estetik ve konforu buluşturuyoruz.
                </div>
            </div>

            <div class="col-lg-4">
                <div class="about-feature-title">
                    Zamanında Teslimat
                </div>
                <div class="about-feature-content">
                    Müşterilerimiz ile yapılan görüşmeler neticesinde belirtilen sürede teslimat yapıyoruz.
                </div>
            </div>
        </div>
    </div>


    <div class="about-comments">
        <div class="about-title text-center" style="letter-spacing: 1px;">
            Müşterilerimiz Ne Diyor?
        </div>
        <div class="about-slogan text-center">
            Yorumlar
        </div>

        <!---Slider-->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                function comment($text, $name) {
                    echo '<div class="swiper-slide">
                    <div class="comment-text">'.$text.'
                        </div>
                    <div class="comment-star">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="comment-name">
                        '.$name.'
                    </div>
                </div>';
                }

                comment('Zerafet ve incelik bir arada. Unutulmaz günümde mükemmel gelinlik tasarımınız ile beni mutlu ettiğiniz için teşekkür ederim.', 'Ayfer CANFER');
                comment('Sürecin en başından sonuna kadar benimle o kadar güzel ilgilendiniz ki tarif edemem. Tüm çevreme sizi tavsiye ediyorum. Teşekkür ederim, iyi varsınız...', 'Burcu ÖZMEN');
                comment('Instagram üzerinden size ulaşmıştım. Bekletimin çok ötesinde hizmet aldım. Gelinlik tasarımınızı tüm davetlilerim çok beğendi. Teşekkür ederim.', 'Canan KIRKAĞAÇ');
                ?>



            </div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                pagination: {
                    el: ".swiper-pagination",
                    dynamicBullets: true,
                },
            });
        </script>
        <!---Slider-->



    </div>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/pages/about.blade.php ENDPATH**/ ?>