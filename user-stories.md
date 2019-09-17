# User stories

###### All users
| # | As ... | I want ... | So I ... | Security | MoSCoW | Status |
| ------ | ------ | ------ | ------ | ------ | ------ | ------ |
| U0001 | User | to listen to podcasts | I can listen to the podcasts | None | Must have | TODO |
| U0002 | User | to submit an email address | get notifications for any new uploaded podcasts | Protect against SQL-injection, valid email | Must have | TODO |
| U0003 | User | a list of all podcasts | listen to previous podcasts | None | Must have | TODO |
| U0004 | User | to have controls for the audio player | can pauze the podcasts, change volume, etc | None | Must have | TODO |
| U0005 | User | to fill in a contact form | can contact the podcast owners | Protect against SQL-injection & other forms of penetration, valid email | Must have | TODO |
| U0006 | User | to be able to search for podcasts | can find specific podcasts | SQL-injection | Must have | TODO |
| U0007 | User | to leave comments on podcasts | can share my opinion or give feedback | SQL-injection, valid email | Could have | TODO |
| U0008 | User | a navigation menu | can navigate the website | None | Must have | TODO |
| U0009 | User | a dark/light theme switch | don't burn my (...) eyes at night | None | Could have | TODO |
| U0010 | User | the website to remember my options (volume, theme, etc) | can customize the website to my liking | Prevent from storing harmful info & validate input | Could have | TODO |

##### Admins
| # | As ... | I want ... | So I ... | Security | MoSCoW | Status |
| ------ | ------ | ------ | ------ | ------ | ------ | ------ |
| B0001 | Admin | to upload podcasts | make money | Validate field inputs & SQL-injection | Must have | TODO |
| B0002 | Admin | to add descriptions to the podcast | can give context or describe the podcast | SQL-injection | Must have | TODO |
| B0003 | Admin | to add a list of sponsors | show which companies have sponsored the podcast | SQL-injection | Must have | TODO |
| B0004 | Admin | to show a list of donators | show who supported the podcast | Prevent XSS | Must have | TODO |
| B0005 | Admin | to change the content of the website | keep the website up to date & add new content | SQL-injection & XSS | Must have | TODO |
