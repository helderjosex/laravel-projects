<template>
    <div class="col m12">
        <div class="row">
            <nav>
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="#" class="brand-logo">Code Contas</a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li v-for="o in links">
                                <router-link to="'o.routeName'">{{o.label}}</router-link>
                            </li>
                        </ul>
                        <ul class="side-nav" id="mobile-demo">
                            <li v-for="o in links">
                                <router-link to="'o.routeName'">{{o.label}}</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                links: [
                    {label: 'Contas a Pagar', routeName: 'bill-pay.list'}
                ]
            };
        },
        ready() {
            $(function() {
                $(".button-collapse").sideNav();
            });
        }
    }
</script>