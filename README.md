# Overview

This bundle offers utility for dealing with Bootstrap components.

## Pagination

Use the Paginator service to create a Pagination object:

```php
use OHMedia\BootstrapBundle\Service\Paginator;

public function index(Paginator $paginator, PostRepository $postRepository)
{
    $queryBuilder = $postRepository->createQueryBuilder('p');
    $queryBuilder->orderBy('p.publish_date', 'asc');
    
    $limit = 20;
    
    $pagination = $paginator->paginate($queryBuilder, $limit);
}
```

and leverage that object in a template:

```twig
Posts ({{ pagination.count }})

{% for post in pagination.results %}
{# ... #}
{% endfor %}

{{ bootstrap_pagination(pagination) }}
```

## Flash Messages

You can set flash messages using various Bootstrap classes (primary, secondary,
success, danger, warning, etc.) or Symfony standard types (notice, error), and
render them as either Bootstrap Alerts or Toasts:

```twig
{{ bootstrap_alerts() }}
{{ bootstrap_toasts() }}
```

See the Bootstrap documents about [placing Toasts](https://getbootstrap.com/docs/5.2/components/toasts/#placement).

You will need to add extra styles to make the close button white as needed.

## Breadcrumbs

Utilize the bundle's component class called `Breadcrumb` to create an object
that can be used with the `BreadcrumbNode` or `BreadcrumbTrail` components.

The `BootstrapNode` component is meant for creating a complex tree structure
to avoid code repetition.

The `controller` and `route` properties of the `Breadcrumb` class are meant for
the end part of a `BootstrapNode`. This is so a dynamic URL can be matched
without generating it.

If you use the `BootstrapNode` component, you will need to use the
`BreadcrumbNodeTransformer` service to convert it to a `BreadcrumbTrail`.

You can render a `BreadcrumbTrail` via a Twig function:

```twig
{{ bootstrap_breadcrumbs(breadcrumb_trail) }}
```

## Accordion

The `Accordion` component can be comprised of `AccordionItem` components
or via implementing `AccordionItemInterface`.

By default, an `Accordion` will start with all items closed, only allow one
item open at a time, and forego the `accordion-flush` class.

An `Accordion` can be rendered via a Twig functions:

```twig
{{ bootstrap_accordion(accordion) }}
```

### `AccordionItem` Example

```php
use OHMedia\BootstrapBundle\Component\Accordion\Accordion;
use OHMedia\BootstrapBundle\Component\Accordion\AccordionItem;

public function index()
{
    $items = [];
    
    $items[] = new AccordionItem('Header 1', 'Body 1');
    $items[] = new AccordionItem('Header 2', 'Body 2');
    
    $accordion = (new Accordion())
        ->setFirstOpen(false) // default
        ->setAlwaysOpen(false) // default
        ->setFlush(false) // default
        ->setItems(...$items);
}
```

### Interface Example

The entity:

```php
use OHMedia\BootstrapBundle\Component\Accordion\AccordionItemInterface;

class Faq implements AccordianItemInterface
{
    // ...
   
    public function getHeader(): string
    {
        return $this->getQuestion();
    }
   
    public function getBody(): string
    {
        return $this->getAnswer();
    }
}
```

The controller:

```php
use App\Repository\FaqRepository;
use OHMedia\BootstrapBundle\Component\Accordion\Accordion;

public function index(FaqRepository $faqRepository)
{
    $faqs = $faqRepository->findAll();
    
    $accordion = (new Accordion())
        ->setFirstOpen(false) // default
        ->setAlwaysOpen(false) // default
        ->setFlush(false) // default
        ->setItems(...$faqs);
}
```

## Nav

The `Nav` component can be populated via the `NavLink` and `NavDropdown`
components. A `NavDropdown` is populated via `NavLink`.

Security checks and route building will need to be done outside of these
components, as they only deal with the basics.

```php
use OHMedia\BootstrapBundle\Component\Nav\Nav;
use OHMedia\BootstrapBundle\Component\Nav\NavDropdown;
use OHMedia\BootstrapBundle\Component\Nav\NavLink;

// ...

$navbar = new Nav();

$dashboard = (new NavLink('Dashboard'))
    ->setRoute('dashboard');

$navbar->addItem($dashboard);

$userDropdown = new NavDropdown('Users');

if ($security->isGranted('user_edit', $user)) {
    $userList = (new NavLink('Profile'))
        ->setRoute('user_edit')
        ->setRouteParams(['id' => $user->getId()]);
    
    $userDropdown->addLink($userList);
}
```

A `Nav` can be rendered via a Twig function:

```twig
{{ bootstrap_nav(nav) }}
```

An empty `NavDropdown` will not be rendered via this function.

You can also render a whole navbar:

```twig
{{ bootstrap_navbar(nav) }}
```

Set the third parameter to true to render a logout link:

```twig
{{ bootstrap_navbar(nav, '', true) }}
```
