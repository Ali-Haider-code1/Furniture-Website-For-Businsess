<!DOCTYPE html>
<html lang="en">


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/flag-icon-css@3.5.0/css/flag-icon.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>FAQ Page</title>
</head>
<style>
    /* FAQ Page */

    .faq-container {
        display: block;
        margin: auto;
        max-width: 600px;
        width: 100%;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .faq-container #searchInput {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        box-sizing: border-box;
    }

    .faq-container #faqList {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .faq-container .faq-item {
        margin-bottom: 15px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 15px;
    }

    .faq-question {
        font-weight: bold;
        cursor: pointer;
    }

    .faq-answer {
        display: none;
        margin-top: 10px;
    }

    .show-answer {
        display: block;
    }
</style>

<body>

    <?php require_once("header.php"); ?>
    <h2 class="text-center mt-3">Find Solution of your Problem Here!</h2>
    <div class="faq-container mt-3">
        <input type="text" id="searchInput" placeholder="Search FAQ">
        <ul id="faqList"></ul>
    </div>


    <!-- Footer -->
    <footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="../images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="../images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/tiny-slider.js"></script>
<script src="../js/custom.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const faqList = [
  {
    question: "What types of vegetables do you offer?",
    answer: "We offer a wide variety of fresh and organic vegetables to cater to different preferences. Our selection includes leafy greens, root vegetables, cruciferous veggies, and more."
  },
  {
    question: "How can I place an order for vegetables?",
    answer: "Placing an order for fresh vegetables is simple! Just browse through our vegetable catalog, select the vegetables you need, and proceed to checkout. You can conveniently order online through our website or mobile app."
  },
  {
    question: "Do you accommodate specific dietary preferences?",
    answer: "Yes, we understand that everyone has unique dietary preferences. Our vegetable offerings include options for vegetarians, vegans, and those with specific dietary requirements. Check our catalog or contact us for more information."
  },
  {
    question: "What are your delivery hours for fresh vegetables?",
    answer: "Our delivery hours vary, and you can check the available delivery times during the checkout process. We are committed to delivering fresh vegetables promptly to ensure you receive the best quality produce for your meals."
  },
  {
    question: "Can I customize my vegetable order?",
    answer: "Absolutely! We provide customization options for many of our vegetables. Whether you want to request a specific quantity, mix and match varieties, or have special preferences, we strive to accommodate your needs. Feel free to include any specific instructions during the ordering process."
  }
];


        const searchInput = document.getElementById("searchInput");
        const faqListContainer = document.getElementById("faqList");

        function populateFAQ() {
            faqList.forEach((faq, index) => {
                const faqItem = document.createElement("li");
                faqItem.className = "faq-item";

                const question = document.createElement("div");
                question.className = "faq-question";
                question.textContent = faq.question;

                const answer = document.createElement("div");
                answer.className = "faq-answer";
                answer.textContent = faq.answer;

                faqItem.appendChild(question);
                faqItem.appendChild(answer);

                faqListContainer.appendChild(faqItem);

                question.addEventListener("click", () => toggleAnswer(index));
            });
        }

        function toggleAnswer(index) {
            const answer = faqListContainer.querySelectorAll(".faq-answer")[index];
            answer.classList.toggle("show-answer");
        }

        searchInput.addEventListener("input", function() {
            const searchTerm = searchInput.value.toLowerCase();

            faqList.forEach((faq, index) => {
                const question = faqListContainer.querySelectorAll(".faq-question")[index];
                const answer = faqListContainer.querySelectorAll(".faq-answer")[index];

                const match = faq.question.toLowerCase().includes(searchTerm);
                if (match) {
                    question.style.display = "block";
                    answer.style.display = "block";
                } else {
                    question.style.display = "none";
                    answer.style.display = "none";
                }
            });
        });

        populateFAQ();
    });
</script>

</html>