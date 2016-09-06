Simple Grid
=================
2016-09-06



A css grid light-weight framework. 


- easy to use 
- elastic
- push feature
- handles nested columns
- light-weight (2.7Kb or 2.2kB minified)
- 12 columns (by default) with margins
- php generator tool to create your own grid




![simple css grid](https://s19.postimg.io/t4s8q0hk1/simplegrid.png)



How to use
---------------

Copy paste the following code in a web page, include the simplegrid.css dependency,
the svg-12grid-gutter-color-percent.svg dependency (if you want the grid canvas in the background, but that's not required),
and open it in the browser.




```html
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Html page</title>
	<link rel="stylesheet" href="simplegrid.css">
	<style>

		
		/*
		If you don't need the background grid (i.e. in production), you can just get 
		rid of this body styling entirely
		*/
		body {
			background: url(svg-12grid-gutter-color-percent.svg) repeat top left;
			width: 100vw;
		}
		
		.column {
			color: white;
			background: rgba(49, 165, 255, 0.8);
			height: 30px;
		}
		
		.column-container{
			height: auto;
		}
		
		.column-container .column{
			margin-top: 20px;
			color: white;
			background: rgba(63, 220, 120, 0.8);
			margin-bottom: 20px;
			height: auto;
			
		}

		.row {
			margin-bottom: 10px;
		}

	</style>
</head>

<body>
<div class="row">
	<div class="column column-1"></div>
	<div class="column column-1"></div>
	<div class="column column-1"></div>
	<div class="column column-1"></div>
	<div class="column column-1"></div>
	<div class="column column-1"></div>
	<div class="column column-1"></div>
	<div class="column column-1"></div>
	<div class="column column-1"></div>
	<div class="column column-1"></div>
	<div class="column column-1"></div>
	<div class="column column-1"></div>
</div>
<div class="row">
	<div class="column column-6"></div>
	<div class="column column-6"></div>
</div>
<div class="row">
	<div class="column column-3"></div>
	<div class="column column-3 push-6"></div>
</div>
<div class="row">
	<div class="column column-3 push-1"></div>
	<div class="column column-3 push-4"></div>
</div>
<div class="row">
	<div class="column column-3 push-1"></div>
	<div class="column column-6 push-2 column-container">
		<div class="row">
			<div class="column column-3">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti deserunt, distinctio ducimus ipsam laborum modi nemo possimus quisquam tempora voluptates. Amet cumque eum explicabo nemo optio quaerat quasi quod, vitae!
			</div>
			<div class="column column-3">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet aperiam consectetur, consequatur consequuntur doloremque eius facilis in officia optio perferendis placeat possimus quo ratione recusandae rerum sequi suscipit tenetur!
			</div>
		</div>
	</div>
</div>
</body>
</html>
```




Create your own grid
-----------------------

Simple grid by default is 12 columns, and margins have a width 1.6vw.

If you want, you can generate your own grids easily using my php generator.

Just look at the source code in the repo, it contains the necessary comments you 
need (you need to know the basics of php though).


If you need to generate the background canvas, have a look 
at the [SvgGridGenerator class](https://github.com/lingtalfi/SvgGridGenerator).





About
-----------

Simple Grid is tested in my local environment: firefox 48, chrome 53.
It uses only one technology: vw, which is cross-browser compatible (except opera-mini).

http://caniuse.com/#feat=viewport-units


Simple grid Was inspired by this article: https://www.sitepoint.com/understanding-css-grid-systems/

The grid show-cased in the article was great, but it had one problem, plus I wanted to add the push feature.
The problem was that it used percentage values for the column widths, and percentage values are inherited.

So with nested columns, it starts to cause some problems:

- semantic problem
- precision problem


I explain the problems in more details below, but the bottom-line is that using vw units solves them 
all (except you loose opera-mini support).


### The semantic problem

imagine you want to nest two columns inside a column-6.
You would hope that putting two column-3 inside a column-6 would take the whole space of the column-6 parent.

```html
<div class="row">
    <div class="column column-6">
        <div class="row">
            <div class="column column-3"></div>
            <div class="column column-3"></div>
        </div>    
    </div>
</div>
```

Well, that's not the case, because of the percentage values.

column-6's width is 49.2% and column-3's width is 23.8%.
Since percentage values are inherited from their containing block, the column-3's width
are 23.8% of the row which inherits itself from the column-6 value.

As a result, the nested column-3 have a width of 23.8% of 49.2% which is probably not what you would expect.


### Precision problem 

So to fix the semantic problem, you would hope that using column-6 inside a column-6 would give a column
that spans 3 columns.

But no, it doesn't. And that's because columns width include the margins in their calculation.
And so to preserve the exact widths of columns, you only have one solution,
recomputes the columns width for all 12 columns.

See how it starts to become a nightmare?

And that would just work for one level of nesting...
 



So there is an easy fix: use the vw unit.
That works pretty well (except opera mini), and solves those two problems right away.
That's because a vw is like a percentage, but relative to the viewport no matter what.
 


So basically, Simple Grid is just the grid system explained in the article, using vw instead of percentage values.
I also added push features,
and finally I included a generator that generates values with a precision of 3 decimals (which is the optimal
number of decimals based on my own experiments).





History Log
------------------
    
- 1.0.0 -- 2016-09-06

    - initial commit
    




