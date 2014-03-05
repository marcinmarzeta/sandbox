@frontend @customer
Feature: Edit profile information
    In order to consult my orders and my invoices
    As a customer
    I want to be able to connect to my personal account

    Background:
        Given I am on "/"

    @200
    Scenario: Connect as customer
        When I am connected with "johndoe" and "johndoe" on "login"
        And I go to "/profile"
        Then I should see "Dashboard"
        And the response status code should be 200

    @profile @customer @edition
    Scenario: Edit my personal information
        When I am connected with "johndoe" and "johndoe" on "login"
        And I go to "/profile/edit-profile"
        Then I should see "User Profile - Edit"
        When I fill in "sonata_user_profile_form_gender" with "m"
        And I fill in "sonata_user_profile_form_firstname" with "Thomas"
        And I fill in "sonata_user_profile_form_lastname" with "Rabaix"
        And I fill in "sonata_user_profile_form_website" with "http://thomas.rabaix.net"
        And I fill in "sonata_user_profile_form_biography" with "Sonata Core Dev"
        And I fill in "sonata_user_profile_form_locale" with "fr"
        And I fill in "sonata_user_profile_form_timezone" with "Europe/Paris"
        And I press "Submit"
        Then I should see "Your profile has been updated."

    @profile @customer @password
        Scenario: Edit my personal information
        When I am connected with "johndoe" and "johndoe" on "login"
        And I go to "/profile/edit-profile"
        When I fill in "fos_user_change_password_form_current_password" with "johndoe"
        And I fill in "fos_user_change_password_form_new_first" with "johndoe"
        And I fill in "fos_user_change_password_form_new_second" with "johndoe"
        And I press "Change password"
        Then I should see "The password has been changed"