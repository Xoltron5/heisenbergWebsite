<?php
    include 'header.php';
?> 

<head>
    <link rel="stylesheet" href="css/index.css">
</head>
<div class="main">
    <div class="top">
        <p>
            <?php
                if (isset($_SESSION["useruid"])) {
                    echo "Hello ".$_SESSION["useruid"]."!";
                }
            ?>
        </p>
    </div>

    <div class="blogs" id="healthhub">
        <h2>Explore Our Health Hub</h2>
        <img src="Icons/pharmancyicon.avif" alt="Pharmancy Image">
        <p>
        Greetings from the Heisenberg Pharmacy Health Hub, where wellness and knowledge collide. 
        Explore a vast array of well chosen resources to help you make informed decisions about your health. 
        Our educational materials contain advice from committed healthcare professionals who recognize that 
        the right information has the power to change lives. They go beyond simple facts.
        Our articles, infographics, and videos are intended to educate and inform, whether you're navigating 
        the challenges of medication management or looking for lifestyle suggestions for improved health. 
        Learn more about the newest trends in health, expand your knowledge of different medical issues, and
        figure out how to get the most out of your prescription drugs.
        Every content piece offers a chance to learn and develop healthier habits.
        So go ahead and use Heisenberg Pharmacy to increase your health literacy—where your health is our top priority.
        </p>
    </div>

    <div class="blogs" id="lifestyleandwellness">
        <h2>Lifestyle and Wellness: A Balanced Approach to Health</h2>
        <img src="Icons/healthy-lifestyle.jpg" alt="Pharmancy Image">
        <p>
            Take a holistic approach to wellness by using our guide on lifestyle and wellness. 
            You can discover tips for striking a healthy balance between exercise, diet, and 
            mental health here. The foundation of wellness is proper nutrition; learn how to 
            read food labels, make nutrient-dense recipes, and keep up with the newest superfoods
            that can improve your health. Exercise is more than just staying fit; it's about 
            creating a routine that works for you and improves your health at any age. We're here
            to support you on your journey, whether it's choosing the best workout plan, realizing
            the value of sleep, or discovering mindful activities like yoga and meditation.
        </p>
    </div>

    <div class="blogs" id="alternativemedicine">
        <h2>Navigating Alternative Medicine</h2>
        <img src="Icons/Alternative Medicine.webp" alt="Pharmancy Image">
        <p>
        Explore the vast field of alternative medicine, which combines traditional methods with contemporary wellness. 
        This section is devoted to people looking for alternative or complementary methods of medical care. Discover 
        the possible advantages of herbal supplements, each with a unique usage history and frequently backed by recent 
        studies. Learn about the underlying theories of homeopathy, acupuncture, and Ayurveda and consider how these complementary
        therapies can complement western medicine to promote healing and overall health.
        It's crucial to approach alternative therapies critically and with knowledge if you want to pursue wellness. We demystify 
        myths and present the facts while offering evidence-based insights into the efficacy of various supplements and remedies. 
        </p>
    </div>
</div>