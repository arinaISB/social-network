<template>
    <header class="block">
        <ul class="header-menu horizontal-list">
            <li>
                <a class="header-menu-tab" :href="props.mainPageUrl"><span class="icon fontawesome-user scnd-font-color"></span>Account</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#3"><span class="icon fontawesome-envelope scnd-font-color"></span>Messages</a>
            </li>
            <li>
                <a class="header-menu-tab" :href="props.feedUrl"><span class="icon fontawesome-star-empty scnd-font-color"></span>Feed</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#5"><span class="icon fontawesome-star-empty scnd-font-color"></span>Subscriptions</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#5"><span class="icon fontawesome-star-empty scnd-font-color"></span>Notifications</a>
            </li>
            <li>
                <a id="logout-button" class="header-menu-tab" :href="props.logoutUrl">
                    <img src="https://cdn.icon-icons.com/icons2/2943/PNG/512/logout_icon_184025.png" alt="Log Out" height="20" style="vertical-align: middle; margin-right: 8px;">
                    Log out
                </a>
            </li>
        </ul>
        <div class="profile-menu">
            <div class="profile-picture small-profile-picture">
                <img width="40px" :src="avatarUrl || defaultAvatarUrl">
            </div>
        </div>
    </header>
</template>

<script setup>
import {onMounted, ref, defineProps} from 'vue'

const avatarUrl = ref(null);
const defaultAvatarUrl = 'https://media.istockphoto.com/id/1209654046/vector/user-avatar-profile-icon-black-vector-illustration.jpg?s=612x612&w=0&k=20&c=EOYXACjtZmZQ5IsZ0UUp1iNmZ9q2xl1BD1VvN6tZ2UI=';

const getUserAvatar = () => {
    axios.get('avatar')
        .then(response => {
            avatarUrl.value = response.data.avatar_url;
        })
        .catch(error => {
            console.error('Ошибка при получении url_avatar пользователя:', error);
            avatarUrl.value = defaultAvatarUrl;
        })
}

onMounted(getUserAvatar);

const props = defineProps({
    feedUrl: String,
    logoutUrl: String,
    mainPageUrl: String,
});
</script>

<style scoped>
.block {
    margin-bottom: 25px;
    background: #394264;
    border-radius: 5px;
}

header {
    width: 67%;
    margin-left: auto;
    margin-right: 265px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    box-sizing: border-box;
    background: #394264;
    border-radius: 5px;
    box-shadow: 0px 1px 1px black;
    border: 1px solid #1f253d;
}

.header-menu {
    list-style: none;
    display: flex;
    align-items: center;
    padding: 0;
    margin: 0;
    font-family: 'Ubuntu', sans-serif;
    font-size: 15px;
    color: #fff;
}

.header-menu li {
    position: relative;
}

.header-menu-tab {
    padding: 0 27px;
    line-height: 74px;
    font-size: 17px;
    -webkit-transition: background .3s;
    transition: background .3s;
    display: block;
    align-items: center;
    height: 100%;
    color: #fff;
    text-decoration: none;
}

.header-menu-tab:hover {
    background: #50597b;
    border-bottom: 4px solid #11a8ab;
    text-decoration: none;
}

.header-menu-tab .icon {
    padding-right: 10px;
}


.header-menu-number {
    position: absolute;
    line-height: 22px;
    padding: 0 6px;
    font-weight: 700;
    background: #e64c65;
    border-radius: 100%;
    top: 15px;
    right: 2px;
    transition: all .3s linear;
}

.header-menu li:hover .header-menu-number {
    transform: rotate(360deg);
}

.   profile-menu {
    display: flex;
    align-items: center;
}

.profile-menu p {
    font-size: 17px;
    margin-right: 10px;
}

.small-profile-picture img {
    object-fit: cover;
    border-radius: 50%;
    width: 100%;
    height: 100%;
}

.small-profile-picture {
    border: 2px solid #50597b;
    width: 40px;
    height: 40px;
    position: relative;
    top: 15px;
    display: flex;
    justify-content: center;
    align-items: center
}

.scnd-font-color {
    color: #9099b7;
}

input[type=text]::-webkit-input-placeholder { /* WebKit browsers */
    color: #fff;
}
input[type=text]:-moz-input-placeholder { /* Mozilla Firefox 4 to 18 */
    color: #fff;
}
input[type=text]::-moz-input-placeholder { /* Mozilla Firefox 19+ */
    color: #fff;
}
input[type=text]:-ms-input-placeholder { /* Internet Explorer 10+ */
    color: #fff;
}
input[type=text]:focus {
    outline: none;
    border: 1px solid #11a8ab;
}

.horizontal-list {
    margin: 0;
    padding: 0;
    list-style-type: none;
}
.horizontal-list li {
    float: left;
}

.icon {
    font-size: 25px;
}

.small-profile-picture img {
    object-fit: cover; /* Cover the entire area of the container */
    border-radius: 50%; /* Make the image round */
    width: 100%; /* Set width to 100% of the container */
    height: 100%; /* Set height to 100% of the container */
}

.small-profile-picture {
    border: 2px solid #50597b;
    width: 40px;
    height: 40px;
    position: relative;
    top: 15px;
    display: flex;
    justify-content: center;
    align-items: center
}

.header-menu-number {
    position: absolute;
    line-height: 22px;
    padding: 0 6px;
    font-weight: 700;
    background: #e64c65;
    border-radius: 100%;
    top: 15px;
    right: 2px;
    -webkit-transition: all .3s linear;
    transition: all .3s linear;
}
.header-menu li:hover .header-menu-number {
    text-decoration: none;
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);

}
.profile-menu {
    float: right;
    height: 80px;
    padding-right: 30px;
}
.profile-menu p {
    font-size: 17px;
    display: inline-block;
    line-height: 76px;
    margin: 0;
    padding-right: 10px;
}
.profile-menu a {
    padding-left: 5px;
}
.profile-menu a:hover {
    text-decoration: none;
}
.small-profile-picture {
    display: inline-block;
    vertical-align: middle;
}

#logout-button {
    background: none;
    border: none;
    color: #fff;
    cursor: pointer;
    padding: 0 27px;
    font-size: 17px;
    line-height: 74px;
    display: inline-block;
    -webkit-transition: background .3s;
    transition: background .3s;
}

#logout-button:hover {
    background: #50597b;
    border-bottom: 4px solid #11a8ab;
}

#logout-button img {
    vertical-align: middle;
    margin-right: 8px;
}
</style>
