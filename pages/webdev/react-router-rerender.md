Forcing a Component Reset with React Router
=======================================

2023.07.11

Here's the problem I was trying to solve:

We have a component page that can be loaded from two different routes, but each route passes a different prop value. 
We found ourselves spending a lot of effort testing that the state of all the fields in our form reset properly when you switched from one route to another, or went somewhere else in the site and came back. 

Boy, wouldn't it be so much easier if there was a magic 'reset state' button we could push?

Here's the solution I found: instead of using the `element` prop on `Route`, use the `Component` prop and an anonymous function to render the component.

Here's a shortened version of our Routes, so you can see both the standard `element` way of doing it and the warned-against `Component` way. 
You can also see where I had to tell SonarQube to back off - the behavior it warns about is _exactly_ what I want here.

```javascript
<Routes>
  <Route path="/" element={<HomePage />} />
  <Route path="/report/:reportGroup?/:reportName?/id/:reportId" element={<ReportPage />} />
  <Route path="/report/new/standard" Component={() => <AddReportPageWrapper type={ReportType.Standard} />} /> {/* NOSONAR - this intentionally forces a re-render */}
  <Route path="/report/new/custom" Component={() => <AddReportPageWrapper type={ReportType.Custom} />} /> {/* NOSONAR */}
  <Route path="/*" element={<Error404Page />} />
</Routes>
```

Short, sweet, and neatly solves the problem without adding additional complexity to our state management.
