<template>
    <div class="tweets-block">
        <h2 class="titular"><span class="icon zocial-twitter"></span>LATEST POSTS</h2>
        <div v-for="post in props.posts" :key="post.id" class="tweet first">
            <p>{{ post.content }}</p>
            <p><a class="time-ago scnd-font-color" href="#18">created {{ timeAgo(post.created_at) }}</a></p>
            <span>{{ getLikesCount(post.id)}} likes</span>
            <form @submit.prevent="likePost(post.id)">
                <button type="submit" style="background: none; border: none; cursor: pointer;">
                    <img src="https://www.svgrepo.com/show/111566/like.svg" alt="Like" class="like-icon">
                </button>
            </form>
            <p class="author-name">{{ post.user.name }}</p>
            <div class="comment-input-container">
                <form @submit.prevent="createComment(post.id)">
                    <input type="text" v-model="post.newCommentText" placeholder="Write a comment..." required>
                    <button type="submit" style="background: none; border: none; cursor: pointer;">
                        <img src="https://www.svgrepo.com/show/309459/comment.svg" alt="Edit" class="comment-icon">
                    </button>
                </form>
            </div>
            <div v-for="comment in filteredComments(post.id)" :key="comment.id" class="comment">
                <div class="comment-header">
                    <strong v-if="comment.user && comment.user.name" class="comment-author">{{ comment.user.name }}:</strong>
                    <span class="comment-time">{{ timeAgo(comment.created_at) }}</span>
                </div>
                <p>{{ comment.content }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import {defineProps, onMounted} from 'vue';
import moment from 'moment';
import { computed } from "vue";
import { ref } from 'vue';

const timeAgo = (datetime) => {
    return moment(datetime).fromNow();
}

const props = defineProps({
    posts: {
        type: Array,
    },
});

const likesCount = {};
const authToken = localStorage.getItem('token');
const comments = ref([]);


props.posts.forEach(post => {
    if (!post.comments || !Array.isArray(post.comments)) {
        post.comments = [];
    }

    likesCount[post.id] = ref(0);
});
console.log(props.posts);
const likePost = (postId) => {
    axios.post('post-like/' + postId, {}, {
        headers: {
            Authorization: `Bearer ${authToken}`,
        }
    })
        .then(response => {
            const liked = response.data.liked;
            const currentLikesCount = getLikesCount(postId).value;
            likesCount[postId].value = liked ? currentLikesCount + 1 : currentLikesCount - 1;
        })
        .catch(error => {
            console.error('Error liking post:', error)
        });
}

const getLikesCount = (postId) => {
    return computed(() => {
        const count = likesCount[postId].value ?? props.posts.find(post => post.id === postId).likes_count;
        return count >= 0 ? count : 0;
    });
}

onMounted(() => {
    loadComments();
});

const createComment =  (postId) => {
    const post = props.posts.find(postItem => postItem.id === postId);

    if (!post.newCommentText.trim()) {
        return;
    }

    axios.post('post-comment/' + postId, {
        content: post.newCommentText
    })
        .then(response => {
            // console.log('Creating comment for post with ID:', postId, response.data);
            loadComments();
            post.newCommentText = '';
        })
        .catch(error => {
            console.error('Error creating comment:', error);
        })
}

const loadComments = () => {
    axios.get('comments')
        .then(response => {
            comments.value = response.data;
            // console.log(response.data);
        })
        .catch(error => {
            console.error('Error fetching comments:', error);
        });
}

const filteredComments = (postId) => {
    return comments.value.filter(comment => comment.post_id === postId);
}
</script>

<style scoped>
.tweets-block {
    box-sizing: border-box;
    padding: 30px;
    width: 67%;
    background: #394264;
    border-radius: 5px;
    margin-bottom: 25px;
    margin-left: 205px;
    box-shadow: 0px 1px 1px black;
    border: 1px solid #1f253d;
}

.tweets-block input::placeholder {
    color: #9099b7;
}

.tweets-block .titular {
    color: #fff;
    margin-bottom: 15px;
    line-height: 60px;
    text-align: center;
    background: #11a8ab;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.tweets-block .tweet {
    background: #50597b;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 3px;
}

.time-ago {
    color: #9099b7;
    font-size: 0.85em;
}

.tweets-block .tweet:first-child {
    margin-top: 0;
}

.tweets-block .tweet:last-child {
    margin-bottom: 0;
}

.tweets-block .tweet p {
    color: #ffffff;
}

.tweets-block .tweet a.time-ago {
    color: #9099b7;
    text-decoration: none;
}

.tweets-block .tweet a.time-ago:hover {
    text-decoration: underline;
}

.tweets-block .tweet .author-name {
    color: #11a8ab;
    font-size: 1rem;
    font-weight: bold;
    margin-top: 5px;
    text-align: right;
}

.comment {
    background: #6c7293;
    padding: 5px 10px;
    margin-top: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.comment-input-container input[type="text"] {
    width: 90%;
    height: 50px;
    padding-left: 45px;
    margin-left: 20px;
    background: #50597b;
    color: #fff;
    border: solid 1px #1f253d;
    border-radius: 5px;
    font-family: 'Ubuntu', sans-serif;
}

.comment-input-container input[type="text"]::placeholder {
    color: #9099b7;
}

.comment-input-container input[type="text"]:focus {
    outline: none;
    border: 1px solid #11a8ab;
}

.comment-input-container button[type="submit"]:hover {
    opacity: 0.8;
    cursor: pointer;
}

.comment-input-container button[type="submit"]:focus {
    outline: none;
}

.comment-input-container button[type="submit"]:active {
    transform: translateY(1px);
}

.comment-input-container .input-icon {
    font-size: 22px;
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #9099b7;
}

.comment-header {
    display: flex;
    align-items: center;
    margin-bottom: 5px;
}

.comment-author {
    margin-right: 10px;
    color: #fff;
}

.comment-time {
    color: #9099b7;
    font-size: 0.85em;
}

.like-icon,
.comment-icon {
    height: 20px;
}

.like-icon:hover,
.comment-icon:hover {
    opacity: 50%;
    cursor: pointer;
}

.comment a.time-ago {
    color: #fff;
    background-color: #6c7293;
    padding: 5px 10px;
    border-radius: 3px;
    font-size: 0.8em;
}

.comment a.time-ago:hover {
    text-decoration: underline;
}

</style>
