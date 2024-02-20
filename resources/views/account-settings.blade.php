<!DOCTYPE html>
<html lang="eng">
<body>

<div class="main-container">

    <div class="middle-container container">
        <div class="account-settings block">
            <h2 class="titular">ACCOUNT SETTINGS</h2>
            <form method="POST" action="{{ route('account.settings.save') }}">
                @csrf
                <div class="input-container">
                    <label for="name" class="scnd-font-color">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" class="text-input" value="{{ $user->name }}">
                </div>
                <div class="input-container">
                    <label for="email" class="scnd-font-color">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="text-input" value="{{ $user->email }}">
                </div>
                <div class="input-container">
                    <label for="phone-number" class="scnd-font-color">Phone Number</label>
                    <input type="text" id="phone-number" name="phone-number" placeholder="Phone Number" class="text-input" value="{{ $user->phone }}">
                </div>
                <div class="input-container">
                    <label for="status" class="scnd-font-color">Status</label>
                    <input type="text" id="status" name="status" placeholder="Status" class="text-input" value="{{ $userInfo->status ?? '' }}">
                </div>
                <div class="input-container">
                    <label for="job" class="scnd-font-color">Job</label>
                    <input type="text" id="job" name="job" placeholder="Job" class="text-input" value="{{ $userInfo->job ?? '' }}">
                </div>
                <div class="input-container">
                    <label for="city" class="scnd-font-color">City</label>
                    <input type="text" id="city" name="city" placeholder="City" class="text-input" value="{{ $userInfo->city ?? '' }}">
                </div>
                <div class="input-container">
                    <label for="hobby" class="scnd-font-color">Hobby</label>
                    <input type="text" id="hobby" name="hobby" placeholder="Hobby" class="text-input" value="{{ $userInfo->hobby ?? '' }}">
                </div>
                <button type="submit" class="publish-button">Save Changes</button>
            </form>
        </div>
    </div>
</div> <!-- end main-container -->

</body>
</html>

<style>
    body {
        background: #1f253d;
    }

    .middle-container {
        margin: 0 auto;
        width: 80%;
        max-width: 600px;
    }

    .account-settings {
        background: #394264;
        border-radius: 5px;
        color: #fff;
        margin-top: 50px;
        padding: 20px 40px 20px 20px;
    }
    .account-settings .input-container {
        margin-bottom: 15px;
    }

    .account-settings .input-container label {
        display: block;
        margin-bottom: 5px;
        color: #9099b7;
    }

    .text-input {
        width: 100%;
        padding: 10px;
        background: #50597b;
        border: 1px solid #394264;
        color: #fff;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .text-input::placeholder {
        outline: none;
        color: #9099b7;
    }

    .text-input:focus {
        outline: none;
        border: 1px solid #11a8ab;
    }

    .publish-button {
        width: auto;
        padding: 10px 15px;
        background-color: #11a8ab;
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
        background-color: #0F9295;
    }
</style>
