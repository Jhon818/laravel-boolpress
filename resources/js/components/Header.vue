<template>
    <header>
        <h1>Sono l'header</h1>
        <div class="main-menu">
            <nav>
                <ul>
                    <li class="nav-item" v-for="(menuItem, index) in menuItems" :key="index" >
                         <router-link :to="{ name: menuItem.name }">{{ menuItem.label }}</router-link> |
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',
    data() {
      return {
          menuItems: [
              {
                  name: 'home',
                  label: 'Home'
              },
              {
                  name: 'about-us',
                  label: 'About Us'
              },
              {
                  name: 'contact-us',
                  label: 'Contact Us'
              },
                {
                  name: 'posts',
                  label: 'Posts'
              }
          ]

      }  
    },
    created() {

    },
    methods: {

    }
}
</script>