<template>
    <div class=" contacts-list border col-sm-4 float-right">
        <ul>
            <li v-for="user in loadUser" :key="user.id" @click="filmsg(user.id)" >
                <div class="avatar">
                    <img src="img/150x150.png" alt="Avatar"/>
                </div>
                <div class="contact">
                    <p class="name">{{ user.name }}</p>
                    <p class="email">{{ user.email }}</p>
                </div>
                <span class="unread" v-if="user.unread"> {{ user.unread }} </span>
            </li>
        </ul>
    </div>
</template>

<script>
import Axios from 'axios';

export default {
    data() {
        return{
            idfil: {
               idForm: 0,
               idTO:0
            }
        }
    },
    methods: {
        filmsg(id){
            this.idfil.idForm = id;
            this.idfil.idTo =  this.$store.getters.idUser;
            this.$store.dispatch('getidUsrFrom', id);

            Axios.post('/api/filmsg', this.idfil)
            .then((response) => { 
                this.$store.dispatch('getUser', response.data.nameUser);
                this.$store.dispatch('getFilMsg', response.data.msgFill);
                this.$store.dispatch('updRead');
            }).catch((error) => {
                console.log(error);
            })
        }
    },
    computed:{
        loadUser(){
            return this.$store.getters.user;
        }
    }
}
</script>

<style lang="scss" scoped>
.contacts-list {
    flex: 2;
    max-height: 100%;
    height: 500px;
    overflow: auto;
    ul {
        list-style-type: none;
        padding-left: 0;
        li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #aaaaaa;
            height: 80px;
            position: relative;
            cursor: pointer;
            &.selected {
                background: #dfdfdf;
            }
            span.unread {
                background: #1371ec;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 10px;
                padding: 0 4px;
                border-radius: 50%;
            }
            .avatar {
                flex: 1;
                display: flex;
                align-items: center;
                img {
                    width: 55px;
                    border-radius: 50%;
                    margin: 0 auto;
                }
            }
            .contact {
                flex: 3;
                font-size: 15px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;
                p {
                    margin: 0;
                    &.name {
                        font-weight: bold;
                    }
                }
            }
        }
    }
}
</style>