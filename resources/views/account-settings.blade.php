<!DOCTYPE html>
<html lang="eng">
<body>

<div class="main-container">

    <!-- ACCOUNT SETTINGS CONTAINER -->
    <div class="middle-container container">
        <div class="account-settings block">
            <h2 class="titular">ACCOUNT SETTINGS</h2>
            <form method="POST" action="{{ route('account.settings.save') }}">
                @csrf
                <div class="input-container">
                    <label for="name" class="scnd-font-color">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" class="text-input">
                </div>
                <div class="input-container">
                    <label for="email" class="scnd-font-color">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="text-input">
                </div>
                <div class="input-container">
                    <label for="phone-number" class="scnd-font-color">Phone Number</label>
                    <input type="text" id="phone-number" name="phone-number" placeholder="Phone Number" class="text-input">
                </div>
                <div class="input-container">
                    <label for="status" class="scnd-font-color">Status</label>
                    <input type="text" id="status" name="status" placeholder="Status" class="text-input">
                </div>
                <div class="input-container">
                    <label for="job" class="scnd-font-color">Job</label>
                    <input type="text" id="job" name="job" placeholder="Job" class="text-input">
                </div>
                <div class="input-container">
                    <label for="city" class="scnd-font-color">City</label>
                    <input type="text" id="city" name="city" placeholder="City" class="text-input">
                </div>
                <div class="input-container">
                    <label for="hobby" class="scnd-font-color">Hobby</label>
                    <input type="text" id="hobby" name="hobby" placeholder="Hobby" class="text-input">
                </div>
                <button type="submit" class="publish-button">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- RIGHT-CONTAINER -->
    <!-- Similar RIGHT-CONTAINER as above -->

</div> <!-- end main-container -->

</body>
</html>

<style>
    body {
        background: #1f253d; /* Dark background for the whole page */
    }

    .middle-container {
        margin: 0 auto; /* This will center the container */
        width: 80%; /* You can adjust this value to make it narrower */
        max-width: 600px; /* Or you can set a max-width */
    }

    .account-settings {
        padding: 20px;
        background: #394264; /* Slightly lighter background for the form area */
        border-radius: 5px;
        color: #fff;
        margin-top: 50px; /* Adjusted margin-top for spacing from the top */
        padding-right: 40px;
    }
    .account-settings .input-container {
        margin-bottom: 15px;
    }

    .account-settings .input-container label {
        display: block;
        margin-bottom: 5px;
        color: #9099b7; /* Grey color for labels */
    }

    .text-input {
        width: 100%;
        padding: 10px;
        background: #50597b;
        border: 1px solid #394264; /* Border color to match the input field background */
        color: #fff;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .text-input::placeholder {
        outline: none;
        color: #9099b7; /* Grey color for placeholders */
    }

    .text-input:focus {
        outline: none;
        border: 1px solid #11a8ab;
    }

    .publish-button {
        width: auto;
        padding: 10px 15px;
        background-color: #11a8ab; /* Button color from the theme */
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: block;
        margin-top: 20px;
    }

    .publish-button:hover {
        background-color: #0F9295; /* Darker shade for hover state */
    }
</style>
