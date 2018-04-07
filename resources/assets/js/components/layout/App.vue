<template>
    <div class="panel panel-default">
        
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <router-link to="form">
                        <a class="navbar-brand">
                            MHI
                        </a>
                     </router-link>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        
                        <li>
                            <router-link :to="{ name: 'user.search'}">
                                Account
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'device.search'}">
                                 Devices
                             </router-link>
                        </li>
                      
                        <li>
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Reports <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">                                  
                            <li>
                                <router-link :to="{ name: 'report.map'}">
                                    Maps
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'report.graph'}">
                                    Graph
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'device.data'}">
                                    Data
                                </router-link>
                            </li>
                          </ul>
                        </li>
                        <li>
                          <router-link :to="{ name: 'device.search'}">
                                About Us
                          </router-link>
                        </li>
                        <li>
                          <router-link :to="{ name: 'device.search'}">
                                Support
                          </router-link>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                  
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                  Administrator<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/user/maintenance/editProfile">
                                            Edit Profile
                                        </a>
                                        <a href="#"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="#" method="POST" style="display: none;">
                                         
                                        </form>
                                    </li>
                                </ul>
                            </li>
                     
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="panel-body">
            <div class="container">
                <router-view></router-view>
            </div>
            
        </div>
    </div>
</template>
<script>
import Navigation from './Navigation'
export default {

    name: 'App',
    components : {
    	Navigation
    },
    data() {
        return {}
    }
}
</script>
<style lang="css" scoped>
</style>
