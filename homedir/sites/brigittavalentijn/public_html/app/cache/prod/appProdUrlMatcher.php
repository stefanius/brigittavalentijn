<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/cms')) {
            // stef_bvadminbundle_cms_index
            if ($pathinfo === '/cms') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_stef_bvadminbundle_cms_index;
                }

                return array (  '_controller' => 'Stef\\BVAdminBundle\\Controller\\AdminController::indexAction',  '_route' => 'stef_bvadminbundle_cms_index',);
            }
            not_stef_bvadminbundle_cms_index:

            if (0 === strpos($pathinfo, '/cms/news')) {
                // stef_bvadminbundle_add_news
                if ($pathinfo === '/cms/news/add') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_stef_bvadminbundle_add_news;
                    }

                    return array (  '_controller' => 'Stef\\BVAdminBundle\\Controller\\AdminNewsController::createAction',  '_route' => 'stef_bvadminbundle_add_news',);
                }
                not_stef_bvadminbundle_add_news:

                // stef_bvadminbundle_edit_news
                if (preg_match('#^/cms/news/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_stef_bvadminbundle_edit_news;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'stef_bvadminbundle_edit_news')), array (  '_controller' => 'Stef\\BVAdminBundle\\Controller\\AdminNewsController::updateAction',));
                }
                not_stef_bvadminbundle_edit_news:

                // stef_bvadminbundle_index_news
                if ($pathinfo === '/cms/news') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_stef_bvadminbundle_index_news;
                    }

                    return array (  '_controller' => 'Stef\\BVAdminBundle\\Controller\\AdminNewsController::indexAction',  '_route' => 'stef_bvadminbundle_index_news',);
                }
                not_stef_bvadminbundle_index_news:

            }

            if (0 === strpos($pathinfo, '/cms/pages')) {
                // stef_bvadminbundle_add_page
                if ($pathinfo === '/cms/pages/add') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_stef_bvadminbundle_add_page;
                    }

                    return array (  '_controller' => 'Stef\\BVAdminBundle\\Controller\\AdminPageController::createAction',  '_route' => 'stef_bvadminbundle_add_page',);
                }
                not_stef_bvadminbundle_add_page:

                // stef_bvadminbundle_edit_page
                if (preg_match('#^/cms/pages/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_stef_bvadminbundle_edit_page;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'stef_bvadminbundle_edit_page')), array (  '_controller' => 'Stef\\BVAdminBundle\\Controller\\AdminPageController::updateAction',));
                }
                not_stef_bvadminbundle_edit_page:

                // stef_bvadminbundle_index_page
                if ($pathinfo === '/cms/pages') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_stef_bvadminbundle_index_page;
                    }

                    return array (  '_controller' => 'Stef\\BVAdminBundle\\Controller\\AdminPageController::indexAction',  '_route' => 'stef_bvadminbundle_index_page',);
                }
                not_stef_bvadminbundle_index_page:

            }

        }

        // stef_bvbundle_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_stef_bvbundle_homepage;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'stef_bvbundle_homepage');
            }

            return array (  '_controller' => 'Stef\\BVBundle\\Controller\\PageController::indexAction',  '_route' => 'stef_bvbundle_homepage',);
        }
        not_stef_bvbundle_homepage:

        // stef_bvbundle_about
        if ($pathinfo === '/about') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_stef_bvbundle_about;
            }

            return array (  '_controller' => 'Stef\\BVBundle\\Controller\\PageController::aboutAction',  '_route' => 'stef_bvbundle_about',);
        }
        not_stef_bvbundle_about:

        // stef_bvbundle_contact
        if ($pathinfo === '/contact') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_stef_bvbundle_contact;
            }

            return array (  '_controller' => 'Stef\\BVBundle\\Controller\\PageController::contactAction',  '_route' => 'stef_bvbundle_contact',);
        }
        not_stef_bvbundle_contact:

        // stef_bvbundle_blog_show
        if (preg_match('#^/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_stef_bvbundle_blog_show;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'stef_bvbundle_blog_show')), array (  '_controller' => 'Stef\\BVBundle\\Controller\\BlogController::showAction',));
        }
        not_stef_bvbundle_blog_show:

        if (0 === strpos($pathinfo, '/nieuws')) {
            if (0 === strpos($pathinfo, '/nieuws/archief')) {
                // stef_bvbundle_news_archive_current_year_show
                if ($pathinfo === '/nieuws/archief') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_stef_bvbundle_news_archive_current_year_show;
                    }

                    return array (  '_controller' => 'Stef\\BVBundle\\Controller\\NewsController::showArchiveAction',  '_route' => 'stef_bvbundle_news_archive_current_year_show',);
                }
                not_stef_bvbundle_news_archive_current_year_show:

                // stef_bvbundle_news_archive_show
                if (preg_match('#^/nieuws/archief/(?P<year>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_stef_bvbundle_news_archive_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'stef_bvbundle_news_archive_show')), array (  '_controller' => 'Stef\\BVBundle\\Controller\\NewsController::showArchiveAction',));
                }
                not_stef_bvbundle_news_archive_show:

            }

            // stef_bvbundle_news_show
            if (preg_match('#^/nieuws/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_stef_bvbundle_news_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'stef_bvbundle_news_show')), array (  '_controller' => 'Stef\\BVBundle\\Controller\\NewsController::showAction',));
            }
            not_stef_bvbundle_news_show:

        }

        // stef_bvbundle_view_page
        if (preg_match('#^/(?P<slug>.+)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_stef_bvbundle_view_page;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'stef_bvbundle_view_page')), array (  '_controller' => 'Stef\\BVBundle\\Controller\\PageController::viewPageAction',));
        }
        not_stef_bvbundle_view_page:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
