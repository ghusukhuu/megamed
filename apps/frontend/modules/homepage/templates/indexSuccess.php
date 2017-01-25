<?php include_partial('homepage/banner') ?>

<?php include_partial('homepage/pageTop') ?>

<?php include_partial('homepage/features') ?>

<?php #include_partial('homepage/aboutUs') ?>

<?php #include_partial('homepage/purchase') ?>

<?php #include_partial('homepage/choose') ?>

<?php #include_partial('homepage/thanks') ?>

<?php #include_partial('homepage/work') ?>

<?php #include_partial('homepage/client') ?>

<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '<?php echo $facebook->getAppID() ?>',
            cookie: true,
            xfbml: true,
            oauth: true
        });
        FB.Event.subscribe('auth.login', function (response) {
            window.location.reload();
        });
        FB.Event.subscribe('auth.logout', function (response) {
            window.location.reload();
        });
    };
    (function () {
        var e = document.createElement('script');
        e.async = true;
        e.src = document.location.protocol +
                '//connect.facebook.net/en_US/all.js';
        fbroot = document.getElementById('fb-root');
        if (fbroot != null) {
            fbroot.appendChild(e);
        }
    }());
</script>