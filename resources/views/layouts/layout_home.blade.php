<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="บริษัทตรวจบ้านอันดับ1 ที่มีลูกค้าบอกต่อมากที่สุด &quot;ตรวจจริง เห็นกับตา ไปพร้อมลูกค้า&quot;">
    <meta name="keywords" content="ตรวจบ้าน,ตรวจคอนโด,ตรวจก่อนโอน,อันดับ1ตรวจบ้าน,ตรวจบ้านดารา">
    <meta property="og:title" content="&quot;ต.ตรวจบ้าน&quot; บริการตรวจบ้าน | ตรวจคอนโด ก่อนโอนกรรมสิทธิ์">
	<meta property="og:description" content="บริษัทตรวจบ้านอันดับ1 ที่มีลูกค้าบอกต่อมากที่สุด &quot;ตรวจจริง เห็นกับตา ไปพร้อมลูกค้า&quot;">
	<meta property="og:title" content="&quot;ต.ตรวจบ้าน&quot; บริการตรวจบ้าน | ตรวจคอนโด ก่อนโอนกรรมสิทธิ์">	
	<meta property="og:description" content="บริษัทตรวจบ้านอันดับ1 ที่มีลูกค้าบอกต่อมากที่สุด &quot;ตรวจจริง เห็นกับตา ไปพร้อมลูกค้า&quot; /&gt;	
	&lt;meta property=" og:image"="">
	
    <title>{{__('header.document_title')}}</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon1.png">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/component/header.css">
    <link rel="stylesheet" href="/css/component/footer.css">
</head>

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
</body>
<script type="module">
    // Global function to show loading indicator
    import ToastTemplate from "/js/component/toast_template.js"
    const toastTemplate = new ToastTemplate();

    window.showToast = async (content, type) => {
        await toastTemplate.changeToast(content, "");
        await toastTemplate.showToast(type);
    }

    window.changePage = async (content, redirectPath, type) => {
        await toastTemplate.changeToast(content, redirectPath);
        await toastTemplate.redirect(type);
    }
</script>
<script>
    AOS.init();
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FHXE3YJ0CV"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-FHXE3YJ0CV', {
        'cookie_domain': 'none',
        'debug_mode': true
    });
</script>
</html>
