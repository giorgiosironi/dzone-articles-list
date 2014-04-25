A couple of scripts for extracting the list of articles written by a DZone user.

== HOWTO ==
Retrieve the archive pages from your profile:
```
for i in {0..25}; do curl -H 'Referer: http://css.dzone.com/user/355617/track?page=24' "http://css.dzone.com/user/355617/track?page=$i" > $i.html; done
```
Generate a CSV extraction:
```
rm full_list.csv && for i in {0..25}; do php extract_links.php $i.html "Giorgio Sironi" >> full_list.csv; done
```
Generate an HTML representation to put in a blogpost editor (missing <br /> are intentional):
```
php build_html.php full_list.csv > full_list.html
```
