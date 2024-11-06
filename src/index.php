<?php
require '../scripts/auth.php';

if (isset($_GET["success"])) {
	// die;
}

# get secrets from .env file
$jwt_token = auth(getenv('CLIENT_ID'), getenv('CLIENT_SECRET'));

if ($jwt_token) {
	echo "JWT Token: $jwt_token";
} else {
	echo "Failed to obtain JWT token";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homework</title>
	<link rel="stylesheet" href="public/css/syle.css">
	<link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
	<script src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
	<aside>
		<div class="wrapper">
			<div class="item" type="button" onclick="window.location.href='dashboard'" data-bs-toggle="tooltip" data-bs-placement="bottom"
				data-bs-title="Dashboard"><i class="bi bi-speedometer"></i>
				<p>Dashboard</p>
			</div>
			<div class="item disabled" type="button" onclick="window.location.href='inbox'" data-bs-toggle="tooltip"
				data-bs-placement="bottom" data-bs-title="Inbox"><i class="bi bi-inboxes-fill"></i>
				<p>Inbox</p>
			</div>
			<div class="item disabled" type="button" onclick="window.location.href='groups'" data-bs-toggle="tooltip"
				data-bs-placement="bottom" data-bs-title="Groups"><i class="bi bi-people-fill"></i>
				<p>Groups</p>
			</div>
			<div class="item disabled" type="button" onclick="window.location.href='cloud'" data-bs-toggle="tooltip"
				data-bs-placement="bottom" data-bs-title="Cloud"><i class="bi bi-cloud-fill"></i>
				<p>Cloud</p>
			</div>
			<div class="item disabled" type="button" onclick="window.location.href='settings'" data-bs-toggle="tooltip"
				data-bs-placement="bottom" data-bs-title="Settings"><i class="bi bi-gear-fill"></i>
				<p>Settings</p>
			</div>
		</div>
		<div class="options">
			<div class="information">
				<div class="item" type="link" onclick="window.location.href='about'">About</div>
				<div class="item" type="link" onclick="window.location.href='imprint'">Imprint</div>
			</div>
			<div class="settings">
				<div class="item disabled" type="link" onclick="window.location.href='account'" data-bs-toggle="tooltip"
					data-bs-placement="top" data-bs-title="Account"><i class="bi bi-person-fill"></i></div>
				<div class="item disabled" type="link" onclick="window.location.href='account/logout.php'"
					data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Logout"><i
						class="bi bi-door-closed-fill"></i></div>
			</div>
		</div>
	</aside>
	<main>
		<header>
			<div class="info-wrapper">
				<h1>Hello World</h1>
			</div>
			<div class="quick-wrapper">
				<div class="item" type="link" data-bs-toggle="tooltip"
					data-bs-placement="bottom" data-bs-title="New Assignment"><i class="bi bi-file-earmark-plus-fill"></i></div>
				<div class="item disabled" type="link" data-bs-toggle="tooltip"
					data-bs-placement="bottom" data-bs-title="Upload Assignment"><i class="bi bi-cloud-arrow-up-fill"></i></div>
				<div class="item disabled" type="link" data-bs-toggle="tooltip"
					data-bs-placement="bottom" data-bs-title="Group Chat"><i class="bi bi-chat-dots-fill"></i></div>
			</div>
		</header>
		<div class="main">
			<div class="wrapper">
				<section class="homework">
					<h1>Homework</h1>
					<ul class="">
						<li class="list-group-item list-group-item-action">
							<div class="d-flex w-100 justify-content-between">
								<div><input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
									<label class="form-check-label stretched-link" for="firstCheckbox">
										<h5 class="mb-1">List group item heading</h5>
									</label>
								</div>
								<small>3 days ago</small>
							</div>
							<p class="mb-1">Some placeholder content in a paragraph.</p>
							<small>And some small print.</small>
							<hr>
						</li>
						<li class="list-group-item list-group-item-action">
							<div class="d-flex w-100 justify-content-between">
								<div><input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
									<label class="form-check-label stretched-link" for="firstCheckbox">
										<h5 class="mb-1">List group item heading</h5>
									</label>
								</div>
								<small>3 days ago</small>
							</div>
							<p class="mb-1">Some placeholder content in a paragraph.</p>
							<small>And some small print.</small>
						</li>
					</ul>
				</section>
				<section class="statistics">
					<h1>Statistics</h1>
					<div id="myChart"></div>
				</section>

				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHomeworkModal">
					Launch demo modal
				</button>


			</div>
		</div>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
		integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
		crossorigin="anonymous"></script>
	<script src="public/js/main.js"></script>
</body>

<!-- Modal -->
<div class="modal" id="addHomeworkModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addHomeworkModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down">
		<form class="modal-content" method="post" action=".">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Add assignment</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="input-group row">
					<div class="col-8">
						<div class="input-group flex-nowrap">
							<span class="input-group-text item" id="subject-addon">Subject</span>
							<input type="text" id="subject" name="subject" class="form-control item" placeholder="Math, Englisch, ..." aria-label="Username" aria-describedby="subject-addon">
						</div>
					</div>
					<div class="col-4">
						<input type="color" id="homework-color" name="homework-color" style="width: 100%;" class="form-control form-control-color item" value="#FF0000" title="Due Date">
					</div>
				</div>
				<br>
				<div class="input-group row">
					<div class="col">
						<input type="text" id="title" name="title" class="form-control item" placeholder="Titel" aria-label="Titel">
					</div>
					<div class="col">
						<input type="date" id="due-date" name="due-date" class="form-control item" placeholder="Date" aria-label="Due Date" title="Due Date">
					</div>
				</div>
				<br>
				<div class="form-floating">
					<textarea id="comments" name="comments" class="form-control item" placeholder="Leave a comment here" style="height: 100px"></textarea>
					<label for="comments">Comments</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Add Item</button>
			</div>
		</form>
	</div>
</div>

</html>